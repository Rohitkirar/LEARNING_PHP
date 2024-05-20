<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function store()
    {
        if (request()->ajax()) {

            $like = Like::withTrashed()->find(request('like_id'));

            if ($like) {
                if ($like->deleted_at) {
                    $like->update(["deleted_at" => null]);
                    return ["res"=>1 , "like_id" => $like->id ];
                } else {
                    $like->delete();
                    return ["res"=>0];
                }
            } else {
                $like = Post::find(request("post_id"))->likes()->create([
                    "user_id" => auth()->user()->id,
                ]);
                return ["res"=>1 , "like_id" => $like->id  ];
            }
        }
    }

}
