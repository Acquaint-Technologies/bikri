<?php

namespace App\Http\Controllers\JsonCon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    public function getSubscriptionAmount(Request $request)
    {
        $fee = DB::table('subscription_fees')->orderBy('id', 'DESC')->first();
        $totalFee = ($fee->fee * $request->no_of_months);
        return response()->json(['fee' => $totalFee], 200);
    }
}
