<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\CreatePostRequest;
class PostController extends Controller
{

    public function __construct(){

        $this->middleware('auth')->except('index' , 'show');
    
    }

    public function index()
    {
        $posts = Post::with(['comments' , 'images' , 'likes' , 'category'])->latest()->get();
        
        return view('posts.index' , compact('posts') );

    }


    public function create()
    {
        $categories = Category::all()->pluck('title' , 'id');

        return view('posts.create' , compact('categories'));
    }


    public function store(CreatePostRequest $request)
    {


        $post = Post::create([
            'title' => $request['title'] ,
            'category_id' => $request['category_id'] ,
            'user_id' => 10 ,
            'content' => addslashes($request['content'])
        ]);
        


        if($post){
            
            $images = $request->file('images');
            
            if($images){
                foreach($images as $image){
                    $name = $image->getClientOriginalName();
                    $image->move('Upload' , $name); // return path as string
                    $post->images()->create(['url'=>$name]); //return obj of images
                }
            }

            return redirect('/posts');
        }
    }

    public function show($id)
    {
        $post = Post::with('category' , 'images' , 'comments' , 'likes')->find($id);

        return view('posts.show' , compact('post'));
        
    }

    public function edit($id)
    {   
        $post = Post::with('category' , 'images')->find($id);

        $post->content = stripslashes($post->content);
        
        $categories = Category::all()->pluck('title' , 'id');

        return view('posts.edit' , compact('post' , 'categories') );
        
    }

    public function update(Request $request, $id)
    {
        $post = Post::findorfail($id)->update([
            'title' => $request['title'] ,
            'category_id' => $request['category_id'] ,
            'user_id' => 10 ,
            'content' => addslashes($request['content'])
        ]);
        
        if($post){
            $image = $request->file('images');
            
            if($image){
                $name = $image->getClientOriginalName();
                $image->move('Upload' , $name);
                Post::find($id)->images()->create(['url'=>$name]);
            }

            return redirect("/posts/$id");
        }
}


    public function destroy($id)
    {
        if(Post::destroy($id))
            return redirect('/posts');
        
    }
}
