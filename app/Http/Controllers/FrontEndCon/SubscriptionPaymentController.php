<?php

namespace App\Http\Controllers\FrontEndCon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionPaymentController extends Controller
{
    private $controllerInfo;
    public function __construct()
    {
        $this->controllerInfo = (object) array(
            'pageTitle' => 'Subscription Payments',
            'pageUrl' => 'subscription-payments',
        );
    }

    public function index()
    {
        $controllerInfo = $this->controllerInfo;
        return view('public.subscription.payment-index', compact('controllerInfo'));
    }
}
