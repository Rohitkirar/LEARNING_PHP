<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostEditController extends Controller
{
    public function __invoke($id){
        try{
            $categories = Category::all();
            $post = Post::with('images' , 'category')->withTrashed()->find($id);
            return view("admin.posts.edit" , compact("post" , "categories"));
        }catch(Exception $e){
            toastr("Something went wrong, please try again" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
