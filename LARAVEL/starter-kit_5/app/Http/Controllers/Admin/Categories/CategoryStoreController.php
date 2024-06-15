<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryStoreController extends Controller
{
    public function __invoke(CategoryStoreRequest $request){
        try{
            Category::create([
                "name" => $request->name,
                "image" => $request->file('image')->store("uploads/categories" , "public")
            ]);
            toastr("Category created successfully");
            return redirect()->back();
        }
        catch(Exception $e){
            toastr("Something went wrong, please try again" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
