<?php

namespace App\Http\Controllers\FrontEndCon;

use App\Services\Payment\Gateways\BkashPaymentGateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SubscriptionPaymentController extends Controller
{
    private $controllerInfo;

    public function __construct()
    {
        $this->controllerInfo = (object)array(
            'pageTitle' => 'Subscription Payments',
            'pageUrl' => 'subscription-payments',
        );
    }

    public function index()
    {
        $controllerInfo = $this->controllerInfo;
        return view('public.subscription.payment-index', compact('controllerInfo'));
    }

    public function store(Request $request)
    {
        $currentFee = DB::table('subscription_fees')->orderBy('id', 'DESC')->first();
        $payment = new BkashPaymentGateway();
        $chargedAmount = $payment->charge($currentFee->fee * (int)$request->no_of_months);
        $subscription = DB::table('subscription_payments')->insert([
            'owner_id' => Session::get('ownerId'),
            'no_of_month' => $request->no_of_months,
            'paid_amount' => $chargedAmount,
            'transaction_id' => $request->transaction_id,
        ]);
        if ($subscription) {
            Session::flash('message', 'Thank you for using our service! We will review your payment within few hours!');
            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('message', "Whoops! Something went wrong with $this->controllerInfo->pageTitle");
            Session::flash('alert-class', 'alert-success');
        }
        return redirect()->route('subscription-payments.index');
    }
}
