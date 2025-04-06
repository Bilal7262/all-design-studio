<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\StripeService;
class CheckoutController extends Controller
{

    private $stripeService;

    public function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    public function checkoutSession(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer|exists:orders,id',
        ]);

        $order = Order::find($request->order_id);

        if ($order->status === 'fully_paid') {
            return response()->json([
            'status' => 400,
            'message' => 'Order is already fully paid.',
            ]);
        }
        if($order->user_id != auth()->user()->id ){
            return response()->json([
                'status' => 403,
                'message' => 'Unauthorized access to this order.',
            ]);
        }

        $servicePlans = getPlanPrices($order->service, $order->additional_service,$request->half_pay);

        // Find the plan that matches the order price
        $selectedPlan = null;
        foreach ($servicePlans as $plan) {
            if ($plan['price'] == $order->price) {
                $selectedPlan = $plan;
                break;
            }
        }
        if (!$selectedPlan) {
            return back()->with('error', 'No matching plan found for the order price');
        }

        try {
            // Create line items using the price IDs from the selected plan
            $lineItems = [];

            // If there's an additional service, we'll have two price IDs
            if ($order->additional_service) {
                $lineItems = [
                    [
                        'price' => $selectedPlan['stripe_price_ids'][$order->service], // Primary service price ID
                        'quantity' => 1,
                    ],
                    [
                        'price' => $selectedPlan['stripe_price_ids'][$order->additional_service], // Additional service price ID
                        'quantity' => 1,
                    ],
                ];
            } else {
                $lineItems = [
                    [
                        'price' => $selectedPlan['stripe_price_id'], // Single service price ID
                        'quantity' => 1,
                    ],
                ];
            }
            $session = $this->stripeService->createCheckoutSession(
                $lineItems,
                $request->success_url,
                $request->cancel_url,
                auth()->user()->customer,
                auth()->user()->email,
                $order->id,
                auth()->user()->id
            );

            $order->update([
                'session_id' => $session->id,
            ]);

            auth()->user()->update([
                'customer' => $session->customer,
            ]);
            return response()->json([
                'status'=>200,
                'session' => $session->url,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'=>500,
                'message' => 'Error creating checkout session: ' . $e->getMessage(),
            ]);
        }
    }
}
