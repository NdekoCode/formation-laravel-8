<?php

namespace App\Services;

class OrderService
{
    protected $stripeService;
    public function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    public function discount()
    {
        dump('Remise sur le montant ' . $this->stripeService->amount);
    }
}
