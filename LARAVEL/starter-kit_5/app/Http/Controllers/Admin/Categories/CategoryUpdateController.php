<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryUpdateController extends Controller
{
    public function __invoke(CategoryUpdateRequest $request , $id){
        try{
            $category = Category::withTrashed()->findOrFail($id);
            $category->name = $request->name;
            if($request->image){
                if(file_exists($category->path.basename($category->image)))
                    unlink($category->path.basename($category->image));
                $category->image = $request->image->store("uploads/categories" , "public");
            }
            if($category->isDirty()){
                $category->save();
                toastr("Category updated successfully");
                return redirect()->back();
            }
            toastr("No changes made", "warning");
            return redirect()->back();
        }
        catch(Exception $e){
            toastr("Something went wrong, please try again" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
