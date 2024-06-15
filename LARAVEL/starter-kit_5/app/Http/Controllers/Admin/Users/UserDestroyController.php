<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserDestroyController extends Controller
{
    public function __invoke($id){
        try{
            $user = User::findOrFail($id)->delete();
            toastr("User deleted successfully");
            return redirect()->back();
        }catch(Exception $e){
            toastr("Something went wrong" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
