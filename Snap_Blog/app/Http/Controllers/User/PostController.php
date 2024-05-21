<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        try {
            $posts = Post::whereHas('user')->limit(10)->latest()->get();
            return view("user.posts.index", compact("posts"));  
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("users.dashboard");
        }
    }


    public function create()
    {
        try {
            return view("user.posts.create");
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("users.dashboard");
        }
    }


    public function store(CreatePostRequest $request)
    {
        try {
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
            toastr("Post created successfully");
            return redirect()->route("users.dashboard");
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("users.dashboard");
        }
    }

    public function show(Post $post)
    {
        try {
            $post = $post->load([
                        "user",
                        "images" , 
                        "likes"=>function($query){
                            return $query->where("likes.user_id" , "=" , Auth::id());
                        }])
                        ;
            debugbar()->addMessage($post);
            return view("user.posts.show", compact("post"));
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("users.dashboard");
        }
    }

    public function edit($id)
    {
        try {
            $post = Post::with('images')->find($id);
            return view("user.posts.edit", compact('post'));
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("users.dashboard");
        }
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        try {
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
            toastr("Post updated successfully");
            return redirect()->back();
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("users.dashboard");
        }
    }


    public function destroy(Post $post)
    {
        $post->delete();
        toastr("Post deleted successfully");
        return redirect()->route("users.dashboard");
    }
}
