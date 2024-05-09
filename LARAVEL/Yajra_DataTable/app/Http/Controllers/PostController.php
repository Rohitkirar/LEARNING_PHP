<?php

namespace App\Http\Controllers;

use App\DataTables\PostDataTable;
use App\DataTables\UserDataTable;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
    public function index(){
        if(request()->ajax()){

            $dataTable = DataTables::of(Post::withTrashed())
                ->editColumn("category_id" , function($post){
                    return $post->category ? $post->category->title : "uncategorized";
                })
                ->editColumn("content" , '{{ Str::limit($content , 50 ) . "..." }}')
                ->editColumn("created_at" ,function($post){
                    return $post->created_at->diffForHumans();
                })
                ->editColumn("updated_at" ,  function($post){ return $post->updated_at->diffForHumans(); } )
                // ->editColumn("deleted_at" , function($post){
                //     return $post->deleted_at ? view("datatables.postRestoreBtn" , ["id" => $post->id ]) : view("datatables.postDeleteBtn" , ["id" => $post->id ]) ;
                // })
                ->editColumn("deleted_at" , '{{  view( $deleted_at ? "datatables.postRestoreBtn" : "datatables.postDeleteBtn"  , compact("id")) }}')
                ->rawColumns(['deleted_at'])
                ->addColumn("even" , '{{ $id%2==0 ? "1" : "0" }}')
                // ->addRowAttr("align" , "center")
                ->addIndexColumn()
                ;
            return $dataTable->make(true); 
        }
        
        return view("posts.index");
        
    }
    

    public function destroy(Post $post){
        $post->delete();
        toastr("Post Deleted Successfully!");
        return back();
    }

    public function restore($id){
        Post::withTrashed()->find($id)->update(["deleted_at" => null ]) ;
        toastr("Post Restored Successfully!");
        return back();
    }
}
