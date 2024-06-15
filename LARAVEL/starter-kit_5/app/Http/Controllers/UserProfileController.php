<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function __invoke(){
        try{
            $user = Auth::user();
            return view('user.profile.show' , compact("user"));
        }
        catch(Exception $e){
            toastr("Please try Again later" , "error");
            return redirect()->route("pages-home");
        }
    }
}
