<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryDestroyController extends Controller
{
    public function __invoke($id){
        try{
            $category = Category::findOrFail($id)->delete();
            toastr("Category deleted successfully" , 'success');
            return redirect()->back();
        }
        catch(Exception $e){
            toastr("Something went wrong, please try again" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
