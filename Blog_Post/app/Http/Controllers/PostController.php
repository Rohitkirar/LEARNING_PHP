<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
    public function index(){
        $posts = Post::latest()->get();
        return view('admin.posts.index' , compact('posts'));
    }


    public function create(){
        return view('admin.posts.create');
    }

    public function store(CreatePostRequest $request){

        $post = new Post([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);    
        if($request->file('image')){
            if($request->file('image')->storeAs('images' , $request->file('image')->getClientOriginalName())){
                $post['image'] = $request->file('image')->getClientOriginalName();
            }
        }     
        $post->save();

        return redirect()->route('admin.index');
    }
    
    public function show(Post $post){
        return view('blog-post' , compact('post'));
    }
}
