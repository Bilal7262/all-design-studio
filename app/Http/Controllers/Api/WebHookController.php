<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Webhook;

class WebHookController extends Controller
{
    private const HANDLED_EVENT = 'checkout.session.completed';
    private const CENTS_TO_DOLLARS = 100;

    public function checkoutSessionWebhookHandling(Request $request): JsonResponse
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $webhookSecret = env('STRIPE_WEBHOOK_SECRET');

        // Early validation
        if (!$sigHeader) {
            \Log::error('Missing Stripe-Signature header');
            return $this->errorResponse('Missing signature header', 400);
        }

        if (!$webhookSecret) {
            \Log::error('Webhook secret not configured');
            return $this->errorResponse('Webhook secret not configured', 400);
        }

        try {
            // Verify webhook signature
            $event = Webhook::constructEvent($payload, $sigHeader, $webhookSecret);

            // Handle only checkout.session.completed events
            if ($event->type !== self::HANDLED_EVENT) {
                return $this->successResponse('event_not_handled');
            }

            return $this->handleCheckoutSession($event->data->object);

        } catch (SignatureVerificationException $e) {
            \Log::error('Webhook signature verification failed', ['error' => $e->getMessage()]);
            return $this->errorResponse('Invalid signature', 400);
        } catch (\Exception $e) {
            \Log::error('Webhook processing failed', ['error' => $e->getMessage()]);
            return $this->errorResponse('Webhook processing failed', 400);
        }
    }

    private function handleCheckoutSession(object $session): JsonResponse
    {
        try {
            // Extract and validate metadata
            $metadata = $this->extractMetadata($session);
            
            // Find order
            $order = Order::findOrFail($metadata['order_id']);
            
            // Check if order is already fully paid
            if ($order->status === 'fully_paid') {
                return $this->errorResponse('Order is already fully paid', 400);
            }

            // Process payment status
            if ($session->payment_status !== 'paid') {
                return $this->successResponse('unprocessed_payment');
            }

            $amountInDollars = $session->amount_total / self::CENTS_TO_DOLLARS;
            $paymentStatus = $this->determinePaymentStatus($order, $amountInDollars);

            // Update order in a transaction
            \DB::transaction(function () use ($order, $session, $amountInDollars, $paymentStatus) {
                $order->update([
                    'session_id' => $session->id,
                    'status' => $paymentStatus,
                    'paid_amount' => $order->paid_amount + $amountInDollars,
                    'updated_at' => now(),
                ]);
            });

            \Log::info('Webhook processed successfully', [
                'checkout_session_id' => $session->id,
                'payment_status' => $paymentStatus,
                'amount' => $amountInDollars
            ]);

            return $this->successResponse('success');

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            \Log::error('Order not found', ['order_id' => $metadata['order_id'] ?? 'unknown']);
            return $this->errorResponse('Order not found', 404);
        } catch (\Exception $e) {
            \Log::error('Checkout session processing failed', ['error' => $e->getMessage()]);
            return $this->errorResponse('Checkout processing failed', 400);
        }
    }

    private function extractMetadata(object $session): array
    {
        $metadata = $session->metadata ?? new \stdClass();
        return [
            'order_id' => $metadata->order_id ?? null,
            'user_id' => $metadata->user_id ?? null,
        ];
    }

    private function determinePaymentStatus(Order $order, float $amountInDollars): string
    {
        $halfPrice = $order->price / 2;
        $fullPrice = $order->price;

        if (abs($amountInDollars - $fullPrice) < 0.01) {
            return 'fully_paid';
        }

        if (abs($amountInDollars - $halfPrice) < 0.01) {
            return $order->status === 'half_paid' ? 'fully_paid' : 'half_paid';
        }

        return 'unrecognized_payment';
    }

    private function successResponse(string $status): JsonResponse
    {
        return response()->json(['status' => $status], 200);
    }

    private function errorResponse(string $message, int $statusCode): JsonResponse
    {
        return response()->json(['error' => $message], $statusCode);
    }
}