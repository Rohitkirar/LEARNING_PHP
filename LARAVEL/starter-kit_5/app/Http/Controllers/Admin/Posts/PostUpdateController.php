<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostUpdateController extends Controller
{
    public function __invoke(PostUpdateRequest $request , $id){
        try{
            $post = Post::withTrashed()->findOrFail($id);
            $post->title = $request->title;
            $post->category_id = $request->category_id;
            $post->description = $request->description;
            $post->moral = $request->moral;

            DB::transaction(function () use ($request , $post){
            
                if($post->isDirty())
                    $post->save();
                
                if($files = $request->file("file")){
                    $images = [];
                    $i = 0;
                    foreach($files as $file){
                        $images[$i++] = ["path" => $file->store("uploads/images" , "public")];
                    }
                    $post->images()->createMany($images);
                }

            });
            toastr("Post Updated successfully");
            return redirect()->back();
        }catch(Exception $e){
            toastr("Something went wrong, please try again" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
