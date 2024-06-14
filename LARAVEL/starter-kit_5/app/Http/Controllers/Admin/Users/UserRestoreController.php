<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserRestoreController extends Controller
{
    public function __invoke($id){
        try{
            User::onlyTrashed()->find($id)->restore();
            toastr("User restored successfully");
            return redirect()->back();
        }
        catch(Exception $e){
            toastr("Something went wrong");
            return redirect()->route("admin.dashboard");
        }

    }
}
