<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PageCreateController extends Controller
{
    public function __invoke($id){
        try{
            $post = Post::withTrashed()->findOrFail($id);
            return view("admin.pages.create" , compact("post"));
        }
        catch(Exception $e){
            toastr("Something went wrong, please try again" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
