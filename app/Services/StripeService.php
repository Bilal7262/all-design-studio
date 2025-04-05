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

    /**
     * Find or create a customer by email
     */
    public function findOrCreateCustomer(string $email): string
    {
        // Search for existing customers with this email
        $customers = $this->stripe->customers->all(['email' => $email, 'limit' => 1]);

        if (!empty($customers->data)) {
            // Return the existing customer's ID
            return $customers->data[0]->id;
        }

        // If no customer exists, create a new one
        $customer = $this->stripe->customers->create([
            'email' => $email,
        ]);

        return $customer->id;
    }

    public function createCheckoutSession(array $lineItems, string $successUrl, string $cancelUrl, $customer = null, $email = null,$order_id, $user_id)
    {
        try {
            $sessionParams = [
                'success_url' => $successUrl,
                'cancel_url' => $cancelUrl,
                'line_items' => $lineItems,
                'mode' => 'payment',
                'metadata' => [
                    'order_id' => $order_id,
                    'user_id' => $user_id,
                ],
            ];

            // If customer is provided, use it; otherwise, find or create based on email
            if ($customer) {
                $sessionParams['customer'] = $customer;
            } elseif ($email) {
                $sessionParams['customer'] = $this->findOrCreateCustomer($email);
            }

            $session = $this->stripe->checkout->sessions->create($sessionParams);

            return $session;
        } catch (\Exception $e) {
            throw new \Exception('Error creating checkout session: ' . $e->getMessage());
        }
    }
}
