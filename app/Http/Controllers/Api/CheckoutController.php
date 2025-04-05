<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
