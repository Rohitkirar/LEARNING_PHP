<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
    public function index()
    {
        try {
            if(request()->ajax()){
                $posts = Post::with('user' , 'images')->whereHas("user")->withTrashed()->latest();
                return DataTables::of($posts)
                    ->addIndexColumn()
                    ->setRowClass("text-justify")
                    ->editColumn("user.username" , function($post){
                        return ucfirst($post->user->username);
                    })
                    ->editColumn("images.url" , function($post){
                        if($post->images->first())
                            return "<img src='{$post->images->first()->url}' width='80rem' alt='image' />";
                        else
                            return "<img src='' alt='image' />";
                    })
                    ->editColumn("id"  , function ($id){
                        return '<a href="'. route('admin.posts.edit' , $id) .'" class="btn btn-primary">Edit</a>';
                    })
                    ->editColumn("deleted_at"  , function ($post){
                        return $post->deleted_at ? '<a href="'. route('admin.posts.restore' , $post->id) .'" class="btn btn-success">Restore</a>' :  
                        '<a href="'. route('admin.posts.destroy' , $post->id) .'" class="btn btn-danger">Delete</a>' ;
                    })
                    ->rawColumns(['images.url' , "deleted_at" , "id"])
                    ->editColumn("caption" , '{{Str::limit($caption , 50)}}')
                    ->editColumn("created_at" , function($user){return $user->created_at->diffForHumans() ; })
                    ->editColumn("updated_at" , function($user){return $user->updated_at->diffForHumans() ; })
                    ->make();
            }
            return view("admin.posts.index");
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
            return redirect()->route("admin.dashboard");
        }
    }


    public function create()
    {
        try {
            return view("admin.posts.create");
        } catch (Exception $e) {
            toastr($e->getMessage() , 'error');
            return redirect()->route("admin.dashboard");
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
            return redirect()->route("admin.posts.index");
        } catch (Exception $e) {
            toastr($e->getMessage() , 'error');
            return redirect()->route("admin.dashboard");
        }
    }

    public function show(Post $post)
    {
        try {
            return view("admin.posts.show", compact("post"));
        } catch (Exception $e) {
            toastr($e->getMessage() , 'error');
            return redirect()->route("admin.dashboard");
        }
    }

    public function edit($id)
    {
        try {
            $post = Post::with('images')->find($id);
            return view("admin.posts.edit", compact('post'));
        } catch (Exception $e) {
            toastr($e->getMessage() , 'error');
            return redirect()->route("admin.dashboard");
        }
    }

    public function update(UpdatePostRequest $request, $id)
    {
        try {
            $post = Post::find($id);
            $post->user_id = $request->user_id;
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
            return redirect()->route("admin.posts.index");
        } catch (Exception $e) {
            toastr($e->getMessage() , "error");
            return redirect()->route("admin.dashboard");
        }
    }


    public function destroy($id)
    {   try {
            Post::find($id)->delete();
            toastr("Post deleted successfully");
            return redirect()->route("admin.posts.index");
        }catch(Exception $e){
            toastr($e->getMessage() , "error");
            return redirect()->route("admin.dashboard");
        }
    }

    public function restore($id)
    {
        Post::withTrashed()->find($id)->update(['deleted_at' => null]);
        toastr("Post Restored successfully");
        return redirect()->route("admin.posts.index");
    }
}
