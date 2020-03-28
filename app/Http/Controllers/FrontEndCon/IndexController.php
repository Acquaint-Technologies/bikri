<?php

namespace App\Http\Controllers\FrontEndCon;

use App\Http\Controllers\Controller;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function home()
    {
        $sales = Sale::orderBy('id', 'DESC')->take(4)->where('user_id', Auth::id())->get();
        return view('user.home.home', ['sales' => $sales]);
    }

}
