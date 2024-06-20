<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryRestoreController extends Controller
{
    public function __invoke($id){
        try{
            Category::onlyTrashed()->findOrFail($id)->restore();
            toastr("Category Restored Successfully");
            return redirect()->back();
        }
        catch(Exception $e){
            toastr("Something went wrong, please try again" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
