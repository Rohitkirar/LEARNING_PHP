<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostDestroyController extends Controller
{
    public function __invoke($id){
        try{
            Post::findorFail($id)->delete();
            toastr("Post deleted successfully", "success");
            return redirect()->back();
        }catch(Exception $e){
            toastr("Something went wrong. Please try again" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
