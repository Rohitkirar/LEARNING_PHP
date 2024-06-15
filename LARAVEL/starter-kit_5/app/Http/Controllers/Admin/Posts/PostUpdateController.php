<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class PostUpdateController extends Controller
{
    public function __invoke(){
        try{

        }catch(Exception $e){
            toastr("Something went wrong, please try again" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
