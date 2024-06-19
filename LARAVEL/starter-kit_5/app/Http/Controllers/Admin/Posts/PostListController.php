<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PostListController extends Controller
{
    public function __invoke(){
        try{
            if(request()->ajax()){
                return DataTables::of(Post::with("category")->withTrashed())
                        ->addIndexColumn()
                        ->editColumn("created_at" , function($post){
                            return $post->created_at->diffForHumans();
                        })
                        ->editColumn("description" , function($post){
                            return substr($post->description , 0 , 20);
                        })                        
                        ->editColumn("moral" , function($post){
                            return substr($post->moral , 0 , 20);
                        })
                        ->editColumn("action" , function($post){
                            return view("datatables.views.posts.action" , ['post' => $post]);
                        })
                        ->make();
            }
            return view("admin.posts.index");
        }
        catch(Exception $e){
            toastr("Something went wrong" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
