<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class WebHookController extends Controller
{
    public function checkoutSessionWebhookHandling(Request $request)
{
    // Get the raw payload and signature header
    $payload = $request->getContent();
    $sigHeader = $request->header('Stripe-Signature');

    // Your Stripe webhook secret (get this from your Stripe dashboard)
    $webhookSecret = env('STRIPE_WEBHOOK_SECRET');

    try {
        // Verify webhook signature
        $event = \Stripe\Webhook::constructEvent(
            $payload,
            $sigHeader,
            $webhookSecret
        );

        // Handle only checkout.session.completed events
        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;

            // Extract relevant data
            $order_id = $session->metadata->order_id; // Assuming you stored order_id in metadata
            $user_id = $session->metadata->user_id; // Assuming you stored user_id in metadata
            $checkoutSessionId = $session->id;
            $paymentStatus = $session->payment_status;
            $amountTotal = $session->amount_total; // Amount in cents
            $customerEmail = $session->customer_details->email;

            // Convert amount from cents to dollars
            $amountInDollars = $amountTotal / 100;

            // Find or create your payment record (adjust according to your database schema)
            $payment = Order::update(
                ['id' => $order_id],
                [
                    'session_id' => $checkoutSessionId,
                    'status' => $paymentStatus,
                    'amount_paid' => $amountInDollars,
                    'updated_at' => now()
                ]
            );

            // Optional: Log the successful processing
            \Log::info('Webhook processed successfully', [
                'checkout_session_id' => $checkoutSessionId,
                'payment_status' => $paymentStatus,
                'amount' => $amountInDollars
            ]);

            return response()->json(['status' => 'success'], 200);
        }

        // Return success for unhandled event types
        return response()->json(['status' => 'event_not_handled'], 200);

    } catch (\Stripe\Exception\SignatureVerificationException $e) {
        // Invalid signature
        \Log::error('Webhook signature verification failed: ' . $e->getMessage());
        return response()->json(['error' => 'Invalid signature'], 400);

    } catch (\Exception $e) {
        // General error handling
        \Log::error('Webhook processing failed: ' . $e->getMessage());
        return response()->json(['error' => 'Webhook processing failed'], 400);
    }
}
}
