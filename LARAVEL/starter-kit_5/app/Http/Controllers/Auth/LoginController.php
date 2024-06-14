<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    // overriding the method of trait
    public function showLoginForm()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('auth.login', ['pageConfigs' => $pageConfigs]);
    }


    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
