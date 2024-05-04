<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with("user")->get();
        return view("admin.posts.index" , compact("posts"));
    }

    public function create()
    {
        return view("admin.posts.create");
    }


    public function store(CreatePostRequest $request)
    {
        $post = new Post();

        $post->title = $request->title;
        $post->title = $request->content;
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
