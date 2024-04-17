<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
class PostController extends Controller
{

    public function index()
    {
        
        $posts = Post::with(['comments' , 'images' , 'likes' , 'category'])->get();

        return view('posts.index' , compact('posts') );

    }


    public function create()
    {
        $categorys = Category::all();

        return view('posts.create' , compact('categorys'));
    }


    public function store(Request $request)
    {
        
        $post = Post::create([
            'title' => $request['title'] ,
            'category_id' => $request['category_id'] ,
            'user_id' => 10 ,
            'content' => addslashes($request['content'])
        ]);
        
        if($post)
            return redirect('/posts');
        
    }

    public function show($id)
    {
        $post = Post::with('category' , 'images' , 'comments' , 'likes')->find($id);

        return view('posts.show' , compact('post'));
        
    }

    public function edit($id)
    {   
        $post = Post::with('category' , 'images')->find($id);
        
        $categorys = Category::all();

        return view('posts.edit' , compact('post' , 'categorys') );
        
    }

    public function update(Request $request, $id)
    {
        $post = Post::findorfail($id)->update([
            'title' => $request['title'] ,
            'category_id' => $request['category_id'] ,
            'user_id' => 10 ,
            'content' => addslashes($request['content'])
        ]);
        
        if($post)
            return redirect("/posts/$id");
    }


    public function destroy($id)
    {
        if(Post::destroy($id))
            return redirect('/posts');
        
    }
}
