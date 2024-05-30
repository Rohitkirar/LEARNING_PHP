<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostResourceController extends Controller
{
    public function index(){
        
        $posts = Post::with(["images" , "user"=>function($query){
                            return $query->with("image");
                        }])
                        ->withCount(['likes' , "comments"])
                        ->simplePaginate(10);

        return response()->json([
            "success" => true,
            "message" => "posts record fetched successfully" ,
            // "data" => PostResource::collection($posts)->response()->getData(),
            "payload" => PostCollection::make($posts),
            "status_code" => 200,
        ], 200);
    }

    public function show(Post $post){

        $post = $post->load([
                    "images" , 
                    "user"=>function($query){
                        return $query->with("image");
                    }])
                    ->loadCount(["likes" , "comments" ]);

        return response()->json([ 
                "success" => true,
                "message" => "post record fetched successfully" ,
                "data" => PostResource::make($post),
                "status_code" => 200,
            ]);
    }

    public function collectionIndex(){
        
        $posts = Post::with(["images" , "user"=>function($query){
                            return $query->with("image");
                        }])
                        ->simplepaginate(10);

        return new PostCollection($posts);
    }
}
