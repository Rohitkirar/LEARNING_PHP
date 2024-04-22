<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use illuminate\Support\Facades\Redirect;


class LoginController extends Controller
{
    public function authenticate(Request $request){

        $credentials = $request->validate([
            "username" => ['required'] ,
            "password" => ['required']
        ]);

        if(Auth::attempt($credentials)){

            return redirect()->route("users.index");
        
        }
        
        session()->flash("invalid" , "Invalid Username/Password!");

        return redirect()->back();

    }

    public function login(){

        if(Auth::user())
            return redirect(route('users.index'));
        
        return view("common.login");
    
    }

    public function logout(Request $request){
        
        Auth::logout();
        
        $request->session()->invalidate();

        return redirect('/');

    }
}
