<?php

namespace App\Http\Controllers\FrontEndCon;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.Owners.change-password');
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'new_confirm_password' => 'same:new_password',
        ]);
        User::find(Auth::id())->update(['password' => Hash::make($request->new_password)]);
        return redirect('/home')->with('message', 'your password has changed successfully');
    }
}
