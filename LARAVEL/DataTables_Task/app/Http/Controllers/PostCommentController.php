<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PostCommentController extends Controller
{
    public function index(Request $request){

        if(request()->ajax()){

            return DataTables::of(PostComment::with('post'))
            ->editColumn('content' , '{{Str::limit($content, 50)}}')
            
            ->editColumn('title' , function($comment){
                if($comment->post)
                    return $comment->post->title;
            })
            ->editColumn("created_at" , function($comment){
                return $comment->created_at->diffForHumans();
            })
            ->editColumn("updated_at" , function($comment){
                return $comment->updated_at->diffForHumans();
            })
            ->make();
        }
        return view("comments.index");
    }

    public function commentsByPost($post_id){
        if(request()->ajax()){
            return DataTables::of(PostComment::Where('post_id' , '=' , $post_id))
            ->editColumn("created_at", function($comment){
                return $comment->created_at->diffForHumans();
            })
            ->editColumn("updated_at", function($comment){
                return $comment->updated_at->diffForHumans();
            })
            ->make();
        }
        return view("comments.post" , compact('post_id'));
    }
}
