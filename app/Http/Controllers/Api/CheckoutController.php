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

    public function createCheckout(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer|exists:orders,id',
        ]);

        $order = Order::find($request->order_id);

        $servicePlans = getServicePlans($order->service,$order->additional_service);
        return $servicePlans;
        $order->price;
        try {
            $lineItems = [
                [
                    'price' => 'price_1MotwRLkdIwHu7ixYcPLm5uZ',
                    'quantity' => 1,
                ],
            ];

            $session = $this->stripeService->createCheckoutSession(
                $lineItems,
                'https://example.com/success',
            );

            return redirect($session->url);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
