<?php


namespace App\Services\Payment;


interface PaymentGatewayContract
{
    public function setDiscount($amount);

    public function charge($amount);
}
