<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with("user", "images")->withTrashed()->wherehas('user')->latest()->get();

        return view("admin.posts.index", compact("posts"));
    }

    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view("admin.posts.create", compact('categories'));
    }


    public function store(CreatePostRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {

                $post = Post::create([
                    "user_id" => Auth::id(),
                    "category_id" => $request->category_id,
                    "title" => $request->title,
                    "content" => $request->content,
                ]);

                $files = $request->file("file");
                if ($files) {
                    foreach ($files as $file)
                        $post->images()->create(["image" => basename($file->store("images", "public"))]);
                }
            });
            
            toastr("Post Created Successfully!");
            return redirect()->route("posts.index");
        
        } catch (Exception $e) {

            toastr($e->getMessage(), "error");
            return redirect()->route("posts.create");
        
        }
    }

    public function show($id)
    {
        $post = Post::withTrashed()->find($id);
        
        return view("admin.posts.show", compact("post"));
    }


    public function edit($id)
    {
        $post = Post::withTrashed()->find($id);

        $categories = Category::select(["id", "name"])->pluck("name", "id");

        return view("admin.posts.edit", compact("post", "categories"));
    }


    public function update(UpdatePostRequest $request, Post $post)
    {
        try {
            $post->title = $request->title;
            $post->content = $request->content;
            $post->category_id = $request->category_id;

            if ($post->isDirty()) {
                $post->save();
                toastr("Post Updated Successfully");
            } else
                toastr("No changes to Update in Posts", "warning");

                return redirect()->route("posts.show" , $post->id);
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
            return back();
        }
    }


    public function destroy(Post $post)
    {
        try {
            $post->delete();
            toastr("Post Deleted Successfully");
            return redirect()->route("posts.show" , $post->id);
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
            return back();
        }
    }

    public function restore($id)
    {
        try {
            Post::withTrashed()->find($id)->update(["deleted_at" => null]);

            toastr("Post Restored Successfully");

            return redirect()->route("posts.show" , $id);
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
            return back();
        }
    }
}
