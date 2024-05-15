<?php

namespace App\Http\Controllers;

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
            $posts = Post::limit(10)->latest()->get();
            return view("posts.index", compact("posts"));
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("users.index");
        }
    }


    public function create()
    {
        try {
            return view("posts.create");
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("users.index");
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
            return redirect()->route("users.index");
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("users.index");
        }
    }

    public function show(Post $post)
    {
        try {
            return view("posts.show", compact("post"));
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("users.index");
        }
    }

    public function edit(Post $post)
    {
        try {
            return view("posts.edit", compact('post'));
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("users.index");
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
            return redirect()->route("users.index");
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("users.index");
        }
    }


    public function destroy(Post $post)
    {
        $post->delete();
        toastr("Post deleted successfully");
        return redirect()->route("users.index");
    }
}
