<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostShowController extends Controller
{
    public function __invoke($id){
        try{
            $post = Post::with('images' , 'category')->withTrashed()->find($id);
            return view("admin.posts.show" , compact("post"));
        }
        catch(Exception $e){
            toastr("Something went wrong, please try again" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
