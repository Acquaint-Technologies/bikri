<?php

namespace App\Http\Controllers\FrontEndCon;

use App\Http\Controllers\Controller;
use App\Owner;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{
    public function login()
    {
        return view('public.Owners.owner-login');
    }



    protected function saveRegisterInfo($request)
    {
//        Owner::create($request->all());

        $owner = new Owner();
        $owner->business_type = $request->business_type;
        $owner->name = $request->name;
        $owner->owner_phone = $request->owner_phone;
        $owner->owner_email = $request->owner_email;
        $owner->owner_password = Hash::make($request->owner_password);
        $owner->save();

        $ownerId = $owner->id;
        Session::put('ownerId',$ownerId);
        Session::put('ownerName',$owner->name);
        Session::put('OwnerBusinessType',$owner->business_type);


    }



    protected function ownerValidate($request)
    {
        $this->validate($request,[
            'owner_password' => 'min:6|required_with:password_confirmation',
            'password_confirmation' => 'min:6|same:owner_password'

        ]);
    }



    public function saveRegister(Request $request)
    {

        $this->ownerValidate($request);
            $this->saveRegisterInfo($request);
            return redirect('/home')->with('message','you have registered successfully') ;

    }






    public function saveLogin(Request $request)
    {

        $owner = Owner::where('owner_email',$request->owner_email)->first();


        if(password_verify($request->owner_password, $owner->owner_password))
        {
            Session::put('ownerId',$owner->id);
            Session::put('ownerName',$owner->name);
            Session::put('OwnerBusinessType',$owner->business_type);
            return redirect('/home');
        }
        else
        {
            return redirect('/')->with('message','Invalid password');
        }

    }



    public function logOut()
    {
        Session::forget('ownerId');
        Session::forget('ownerName');

        return redirect('/');


    }



    public function registration()
    {
        return view('public.owners.owner-register');
    }
}
