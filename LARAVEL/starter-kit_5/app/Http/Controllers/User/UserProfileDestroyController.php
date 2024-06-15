<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class UserProfileDestroyController extends Controller
{
    public function __invoke(){
        try{
            auth()->user()->delete();
            auth()->logout();
            toastr("Your profile has been Deactivated successfully", "success");
            return redirect()->route("login");

        }catch(Exception $e){
            toastr("Something went wrong", "error");
            return redirect()->route("user.dashboard");
        }
    }
}
