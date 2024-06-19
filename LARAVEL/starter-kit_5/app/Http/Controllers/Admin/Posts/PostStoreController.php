<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostStoreController extends Controller
{
    public function __invoke(PostStoreRequest $request){
        try{
            DB::transaction(function () use ($request){
                $post = Post::create([
                    "title"=> $request->title,
                    "user_id" => Auth::id(),
                    "category_id"=> $request->category_id,
                    "description"=> $request->description,
                    "moral" => $request->moral,
                ]);

                if($files = $request->file("file")){
                    $images = [];
                    $i = 0;
                    foreach($files as $file){
                        $images[$i++] = ["path" => $file->store("uploads/images" , "public")];
                    }
                    $post->images()->createMany($images);
                }

            });
            toastr("Post created successfully");
            return redirect()->route("admin.posts");

        }
        catch(Exception $e){
            toastr("Something went wrong, please try again" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
