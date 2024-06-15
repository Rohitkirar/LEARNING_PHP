<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class PostListController extends Controller
{
    public function __invoke(){
        try{
            if(request()->ajax()){
                
            }
            return view("admin.posts.index");
        }
        catch(Exception $e){
            toastr("Something went wrong" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
