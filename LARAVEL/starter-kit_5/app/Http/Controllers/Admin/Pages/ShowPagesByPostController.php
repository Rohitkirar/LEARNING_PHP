<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class ShowPagesByPostController extends Controller
{
    public function __invoke($post_id){
        try{
            $post = Post::findOrFail($post_id);
            $pages = $post->pages;
            return view("admin.pages.showByPost" , compact("post" , "pages"));
        }catch(Exception $e){
            toastr("Something went wrong, please try again.", "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
