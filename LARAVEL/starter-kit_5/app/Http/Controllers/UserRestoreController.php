<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserRestoreController extends Controller
{
    public function __invoke($id){
        try{
            User::onlyTrashed()->findorFail($id)->restore();
            toastr("User restored successfully", "success");
            return redirect()->back();
        }catch(Exception $e){
            toastr("Something went wrong, please try again" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
