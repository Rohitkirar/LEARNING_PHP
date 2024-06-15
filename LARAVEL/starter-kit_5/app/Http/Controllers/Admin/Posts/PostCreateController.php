<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class PostCreateController extends Controller
{
    public function __invoke(){
        try{
            $categories = Category::all();
            return view("admin.posts.create" , compact("categories"));
        }catch(Exception $e){
            toastr("Something went wrong. Please try again" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
