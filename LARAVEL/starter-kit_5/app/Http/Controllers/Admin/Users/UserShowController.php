<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserShowController extends Controller
{
    public function __invoke($id){
        try{
            $user = User::withTrashed()->findOrFail($id);
            return view('admin.users.show' , compact("user"));
        }catch(Exception $e){
            toastr("Something went wrong" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
