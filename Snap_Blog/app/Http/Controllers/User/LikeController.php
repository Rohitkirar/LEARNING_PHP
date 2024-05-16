<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function index()
    {
    }


    public function create()
    {
    }


    public function store()
    {
        if (request()->ajax()) {

            $like = Like::find(request('like_id'));

            if ($like) {
                if ($like->deleted_at) {
                    $like->update(["deleted_at" => null]);
                    return 1;
                } else {
                    $like->delete();
                    return 0;
                }
            } else {
                Post::find(request("post_id"))->likes()->create([
                    "user_id" => auth()->user()->id,
                ]);
                return 1;
            }
        }
    }

    public function show()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }


    public function destroy()
    {
    }
}
