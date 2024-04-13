<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        
        $postData = Post::with(['comments' , 'images' , 'likes' , 'category'])->get();

        // $postData = $postData->toArray();

        $postData = json_encode($postData);
        
        return view('user.allStoryView' , compact('postData') );

    }


    public function create()
    {

    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {
        return Post::find($id)->user;
        
    }

    public function edit($id)
    {   
        $storyData = Post::with('category')->find($id);

        return view('user.updateStoryForm' , compact('storyData') );
        
    
    }

    public function update(Request $request, $id)
    {
        dd($request->all());
    }


    public function destroy($id)
    {
        
    }
}
