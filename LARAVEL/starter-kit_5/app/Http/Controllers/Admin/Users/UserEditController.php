<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserEditController extends Controller
{
    public function __invoke($id){
        try{
            $user = User::withTrashed()->find($id);
            return view('admin.users.edit' , compact("user"));
        }catch(Exception $e){
            toastr("Something went wrong");
            return redirect()->route("admin.dashboard");
        }
    }
}
