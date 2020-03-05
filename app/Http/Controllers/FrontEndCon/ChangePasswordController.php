<?php

namespace App\Http\Controllers\FrontEndCon;

use App\Http\Controllers\Controller;
use App\Owner;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;
//use App\User;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('public.Owners.change-password');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'new_confirm_password' => 'same:new_password',
        ]);

//        $val = Session::get('ownerId');
//       $change= DB::table('owners')
//            ->where('id',$val)
//            ->get('id');


       Owner::find(Session::get('ownerId'))->update(['owner_password'=> Hash::make($request->new_password)]);
//        Owner::find('id')->update(['owner_password'=> Hash::make($request->new_password)]);
        return redirect('/home')->with('message','your password has changed successfully') ;
//        dd('Password change successfully.');
    }
}
