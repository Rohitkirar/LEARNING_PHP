<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Exception;


class UserProfileEditController extends Controller
{
    public function __invoke(){
        try{
            $user = auth()->user();
            return view("user.profile.edit" , compact("user"));
        }catch(Exception $e){
            toastr("Something went wrong" , "error");
            return redirect()->route("user.dashboard");
        }
    }
}
