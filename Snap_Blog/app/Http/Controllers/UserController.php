<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::limit(10)->get();

        $posts = Post::with("images")->get();

        return view("users.index" , compact("users" , "posts"));
    }


    public function create()
    {
    }


    public function store()
    {
    }

    public function show()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }


    public function destroy()
    {
    }
}
