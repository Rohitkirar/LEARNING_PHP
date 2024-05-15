<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    
    public function index()
    {
    }

    public function create()
    {
    }

    public function store()
    {
        try{
            Comment::create([
                "user_id" => Auth::id(),
                "post_id" => request("post_id"),
                "body" => request("body")
            ]);
            toastr("Comment added successfully");
            return redirect()->back();
        }
        catch(Exception $e){
            toastr($e->getMessage(), 'error');
            return redirect()->back();
        }
    }

    public function show($post_id)
    {
        $comments = Comment::where("post_id" , "=" , $post_id)->latest()->limit(10)->get();
        return $comments->toJson();
    }

    public function edit()
    {
    }

    public function update()
    {
    }


    public function destroy(Comment $comment)
    {
        try{
            $comment->delete();
            toastr("Comment deleted successfully");
            return redirect()->back();
        }
        catch(Exception $e){
            toastr($e->getMessage(), 'error');
            return redirect()->back();
        }

    }
}
