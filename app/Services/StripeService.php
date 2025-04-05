<?php

namespace App\Services;

use Stripe\StripeClient;

class StripeService
{
    private $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(config('services.stripe.secret'));
    }

    public function createCheckoutSession(array $lineItems, string $successUrl, string $cancelUrl)
    {
        try {
            $session = $this->stripe->checkout->sessions->create([
                'success_url' => $successUrl,
                'cancel_url' => $cancelUrl,
                'line_items' => $lineItems,
                'mode' => 'payment',
            ]);

            return $session;
        } catch (\Exception $e) {
            throw new \Exception('Error creating checkout session: ' . $e->getMessage());
        }
    }
}
