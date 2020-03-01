<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;
use Session;

class IndexController extends Controller
{
    public function home()
    {
        $val = Session::get('ownerId');
        $sales = Sale::orderBy('id','DESC')->take(4)->where('owner_id',$val)->get();
        return view('public.home.home',['sales'=>$sales]);
    }

}
