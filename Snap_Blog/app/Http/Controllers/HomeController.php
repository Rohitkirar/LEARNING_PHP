<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(Request $request){

        $posts = Post::latest()->limit(10)->get();

        $categories = Category::latest()->limit(10)->get();

        return view('welcome' , compact( "posts" , "categories"));
    }
}
