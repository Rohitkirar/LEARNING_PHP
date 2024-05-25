<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){
        try{
            $posts = Post::simplePaginate(10);

            return response()->json([
                "status"=>true ,
                "data"=>$posts ,
                "message"=>"Post Records fetched successfully",
                "status_code"=> 200
            ] , 200);

        }catch(Exception $e){
            return response()->json([
                "status"=>false ,
                "message"=>$e->getMessage(),
                "status_code"=> 404
            ] , 404);
        }
    }

    public function store(CreatePostRequest $request){

        try{
            DB::transaction(function () use ($request) {
                $post = Post::create([
                    "user_id" => Auth::id(),
                    "caption" => $request->caption,
                ]);

                $files = $request->file("file");
                
                if ($files) {
                    $images = [];
                    foreach ($files as $file)
                        array_push($images, ["url" => $file->store("uploads", "public")]);

                    $post->images()->createMany($images);
                }
            });
            
            return response()->json([
                "status"=>true ,
                "message"=>"Post Record Created Successfully",
                "status_code"=> 201
            ] , 201);

        }catch(Exception $e){
            return response()->json([
                "status"=>false ,
                "message"=>$e->getMessage(),
                "status_code"=> 400
            ] , 400);
        }

    }

    public function show($id){
        try{
            $post = Post::find($id);
            
            if($post)
                return response()->json([
                    "status"=>true ,
                    "data"=>$post ,
                    "message"=>"Post found successfully",
                    "status_code"=> 200
                ] , 200);
            
            return response()->json([
                "status"=>false ,
                "message"=>"No Post Record found!",
                "status_code"=> 200
            ] , 200); 

        }catch(Exception $e){
            return response()->json([
                "status"=>false ,
                "message"=>$e->getMessage(),
                "status_code"=> 400
            ] , 400);
        }
    }

    public function update(UpdatePostRequest $request , $id){
        try {
            $post = Post::find($id);
            
            if($post){
                
                $post->caption = $request->caption;
                $files = $request->file("file");

                DB::transaction(function () use ($files, $post) {
                    if ($post->isDirty())
                        $post->save();

                    if ($files) {
                        $images = [];
                        foreach ($files as $file)
                            array_push($images, ["url" => $file->store("uploads", "public")]);

                        $post->images()->createMany($images);
                    }
                });

                return response()->json([
                    "status"=>true ,
                    "message"=>"Post Record Updated Successfully",
                    "status_code"=> 200
                ] , 200); 
            }

            return response()->json([
                "status"=>false ,
                "message"=>"No Post Record found!",
                "status_code"=> 200
            ] , 200); 

        }catch(Exception $e){
            return response()->json([
                "status"=>false ,
                "message"=>$e->getMessage(),
                "status_code"=> 400
            ] , 400);
        }
        
    }

    public function destroy($id){
        try{
            
            $post = Post::find($id);
            if($post){
                $post->delete();
                return response()->json([
                    "status"=>true ,
                    "message"=>"Post Record Deleted Successfully",
                    "status_code"=> 200
                ] , 200);
            }
            
            return response()->json([
                "status"=>false ,
                "message"=>"No Post Record found!",
                "status_code"=> 200
            ] , 200);

        }catch(Exception $e){
            return response()->json([
                "status"=>false ,
                "message"=>$e->getMessage(),
                "status_code"=> 400
            ] , 400);
        }
    }
}
