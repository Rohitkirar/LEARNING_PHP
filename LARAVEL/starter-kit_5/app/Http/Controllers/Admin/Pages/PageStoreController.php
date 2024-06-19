<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageCreateRequest;
use App\Models\Page;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageStoreController extends Controller
{
    public function __invoke($post_id , PageCreateRequest $request){
        try{
            $post = Post::withTrashed()->findOrFail($post_id);
            DB::transaction(function() use($request , $post){
                $page = $post->pages()->create([
                    "title" => $request->title,
                    "description" => $request->description,
                    "moral" => $request->moral,
                ]);
                
                if($files = $request->file("file")){
                    $images = [];
                    $i = 0 ;
                    foreach($files as $file){
                        $images[$i++] = [ "path" => $file->store("uploads/images", "public")];
                    }
                    $page->images()->createMany($images);
                }
            });
            toastr("Page created successfully");
            return redirect()->route("admin.posts.pages" , compact("post"));

            
        }
        catch(Exception $e){
            toastr("Something went wrong, please try again" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
