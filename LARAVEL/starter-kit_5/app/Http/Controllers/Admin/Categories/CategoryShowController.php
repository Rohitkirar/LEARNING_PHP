<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryShowController extends Controller
{
    public function __invoke($id){
        try{
            $category = Category::withTrashed()->findOrFail($id);
            return view("admin.categories.show", compact("category"));
        }catch(Exception $e){
            toastr("something went wrong, please try again" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
