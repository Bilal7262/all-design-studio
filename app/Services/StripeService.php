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

    public function createCheckoutSession(array $lineItems, string $successUrl, string $cancelUrl, $customer = null, $email = null)
{
    try {
        $sessionParams = [
            'success_url' => $successUrl,
            'cancel_url' => $cancelUrl,
            'line_items' => $lineItems,
            'mode' => 'payment',
        ];

        // Conditionally add customer or email to session parameters
        if ($customer) {
            $sessionParams['customer'] = $customer; // Use customer ID if provided
        } elseif ($email) {
            $sessionParams['customer_email'] = $email; // Use email if customer is null and email is provided
        }

        $session = $this->stripe->checkout->sessions->create($sessionParams);

        return $session;
    } catch (\Exception $e) {
        throw new \Exception('Error creating checkout session: ' . $e->getMessage());
    }
}
}
