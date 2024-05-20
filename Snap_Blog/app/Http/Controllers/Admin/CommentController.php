<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CommentController extends Controller
{
   
    public function index()
    {
        if (request()->ajax()) {
            $comments = Comment::with(['user'])
                ->withTrashed()
                ->whereHas('user')
                ->whereHas('post');

            return DataTables::of($comments)
                    ->addIndexColumn()
                    ->editColumn("body" , function ($comment){
                        return substr($comment->body , 0 , 50);
                    })
                    ->editColumn("deleted_at" , function ($comment){
                        return $comment->deleted_at ?  
                                view("buttons.restore" , ["route"=>route("admin.comments.restore" , $comment->id)]) : 
                                view("buttons.delete" , ["route"=>route("admin.comments.destroy" , $comment->id)]) ;
                    })     
                    ->toJson();
        }
        return view("admin.comments.index");
    }

    public function commentsByPost($post_id){
        if(request()->ajax()){
            return DataTables::of(Comment::Where('post_id' , '=' , $post_id))
            ->editColumn("body" , function ($comment){
                return substr($comment->body , 0 , 50);
            }) 
            ->editColumn("created_at", function($comment){
                return $comment->created_at->diffForHumans();
            })
            ->editColumn("updated_at", function($comment){
                return $comment->updated_at->diffForHumans();
            })  
            ->make();
        }
        return view("admin.comments.post" , compact('post_id'));
    }

    
    public function destroy($id)
    {
        try {
            Comment::destroy($id);
            toastr("Comment deleted successfully");
            return redirect()->route("admin.comments.index");
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
            return redirect()->route("admin.dashboard");
        }
    }

    public function restore($id)
    {
        try {
            Comment::withTrashed()->find($id)->update(['deleted_at' => null]);
            toastr("Comment Restored successfully");
            return redirect()->route("admin.comments.index");
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
