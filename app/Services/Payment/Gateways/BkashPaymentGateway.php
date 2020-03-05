<?php


namespace App\Services\Payment\Gateways;


use App\Services\Payment\PaymentGatewayContract;

class BkashPaymentGateway implements PaymentGatewayContract
{
    private $discount;

    public function __construct()
    {
        $this->discount = 0;
    }

    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }

    public function charge($amount)
    {
        return ($amount - $this->discount);
    }
}
