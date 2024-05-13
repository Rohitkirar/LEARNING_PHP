<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
    public function index(){
        if(request()->ajax()){
            
            return DataTables::of(Post::with('user')->whereHas('user'))

            ->editColumn('content' , '{{Str::limit($content, 50)}}')

            ->editColumn("user.first_name" , function($post){
                return $post->user->first_name . " " . $post->user->last_name;
            })

            ->editColumn("created_at" , function($post){
                return $post->created_at->diffForHumans();
            })
            
            ->editColumn("updated_at" , function($post){
                return $post->updated_at->diffForHumans();
            })
            
            ->addColumn("action" , function($post){
                return '<a class="btn btn-primary" href="/comments/'.$post->id.'/post">View</a>';
            })
            // ->whitelist(['title'])
            // ->blacklist(['user.first_name' , 'action'])
            // ->skipPaging()
            // ->setTotalRecords(100)
            // ->setFilteredRecords(50)
            ->make();
        }
        return view("posts.index");
    }

    public function postsByUser($user_id){
        if(request()->ajax()){
            return DataTables::of(Post::where('user_id' , '=' , $user_id))
            ->editColumn('content' , '{{Str::limit($content, 50)}}')
            ->editColumn("created_at" , function($post){
                return $post->created_at->diffForHumans();
            })
            ->editColumn("updated_at" , function($post){
                return $post->updated_at->diffForHumans();
            })
            ->addColumn("action" , function($post){
                return '<a class="btn btn-primary" href="/comments/'.$post->id.'/post">View</a>';
            })
            ->make();
        }
        return view("posts.user" ,  compact('user_id') );
    }

}
