<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostRestoreController extends Controller
{
    public function __invoke($id){
        try{
            Post::onlyTrashed()->findorFail($id)->restore();
            toastr("Post restored successfully", "success");
            return redirect()->back();
        }catch(Exception $e){
            toastr("Something went wrong, please try again" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
