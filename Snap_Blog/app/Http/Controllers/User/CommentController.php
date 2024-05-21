<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return Comment::with(['user'])
                    ->whereHas('user')
                    ->where('post_id', request('post_id'))
                    ->latest()->limit(10)->get()->toJson();
        }
    }
    
    public function store()
    {
        try {
            if (request()->ajax()) {
                Comment::create([
                    "user_id" => Auth::id(),
                    "post_id" => request("post_id"),
                    "body" => request("body")
                ]);
                return 1;
            }
        } catch (Exception $e) {
            toastr($e->getMessage(), 'error');
            return redirect()->back();
        }
    }

    public function destroy(Comment $comment)
    {
        try {
            $comment->delete();
            toastr("Comment deleted successfully");
            return redirect()->back();
        } catch (Exception $e) {
            toastr($e->getMessage(), 'error');
            return redirect()->back();
        }
    }
}
