<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
    public function index(Request $request){
        
        $posts = Post::whereHas('user');

        if($request->has('search')){
            $search = $request->search;
            $posts->where('title' , 'like' , '%' . $search . '%');
        }
        
        
        $posts = $posts->cursorPaginate(10); # it is secure as it passing hashed string in url for page num

        // $posts = Post::latest()->paginate(2);
        // $posts = Post::latest()->simplePaginate(2);
        
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

        return redirect()->route('posts.index')->with('post-create' , "Post Created Successfully");
    }
    
    public function show(Post $post){

        return view('blog-post' , compact('post'));
    
    }

    public function edit(Post $post){
        return view("admin.posts.edit" , compact("post"));
    }

    public function update(Post $post , UpdatePostRequest $request){
        
        $post->title = $request->title;
        $post->content = $request->content;
        
        if($request->file('image')){
            if($request->file('image')->storeAs('images' , $request->file('image')->getClientOriginalName()))
                $post->image = $request->file('image')->getClientOriginalName();
        }

        $post->update();

        return redirect()->route('posts.index')->with('post-update' , 'Post Updated Successfully');

    }

    public function destroy(Post $post){
        
        $post->delete();

        return redirect()->route('posts.index')->with('post-delete' , 'Post Deleted Successfully!' );
    
    }
}
