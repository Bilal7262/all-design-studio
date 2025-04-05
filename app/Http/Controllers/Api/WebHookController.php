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
    $webhookSecret = env('STRIPE_WEBHOOK_SECRET');

    // Add debugging logs
    \Log::debug('Webhook received', [
        'payload' => $payload,
        'signature' => $sigHeader,
        'webhook_secret' => $webhookSecret ? 'set' : 'not set'
    ]);

    if (!$sigHeader) {
        \Log::error('No Stripe-Signature header present');
        return response()->json(['error' => 'Missing signature header'], 400);
    }

    if (!$webhookSecret) {
        \Log::error('Webhook secret not configured');
        return response()->json(['error' => 'Webhook secret not configured'], 400);
    }

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
            $amountTotal = $session->amount_total; // Amount in cents
            $customerEmail = $session->customer_details->email;
            // Convert amount from cents to dollars
            $amountInDollars = $amountTotal / 100;
            // Find or create your payment record (adjust according to your database schema)
            $order = Order::where('id', $order_id)->first();
            if (!$order) {
                return response()->json(['error' => 'Order not found'], 404);
            }
            if($session->payment_status === 'paid'){
                if($amountInDollars === ($amountTotal / 2)){
                    $paymentStatus = 'half_paid';
                }
                elseif($amountInDollars === $amountTotal){
                    $paymentStatus = 'full_paid';
                }
                else{
                    $paymentStatus = 'unrecognized payment';
                }
            }

            $paymentStatus = $amountInDollars < $order->price ? 'half_paid' : 'full_paid';
            $order->update(
                [
                    'session_id' => $checkoutSessionId,
                    'status' => $paymentStatus,
                    'paid_amount' => $amountInDollars,
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
        return response()->json(['error' => 'Invalid signature '.$e->getMessage()], 400);

    } catch (\Exception $e) {
        // General error handling
        \Log::error('Webhook processing failed: ' . $e->getMessage());
        return response()->json(['error' => 'Webhook processing failed'. $e->getMessage()], 400);
    }
}
}
