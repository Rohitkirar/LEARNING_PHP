<?php

namespace App\Http\Controllers;

use App\DataTables\PostDataTable;
use App\DataTables\UserDataTable;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    public function index(PostDataTable $dataTable){

        return $dataTable->render("posts.index");
    
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
