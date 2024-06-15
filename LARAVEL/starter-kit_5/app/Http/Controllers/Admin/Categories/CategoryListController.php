<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryListController extends Controller
{
    public function __invoke(){
        try{
            if(request()->ajax()){
                
                $categories = Category::withTrashed()->latest();
                
                return DataTables::of($categories)
                    ->editColumn("deleted_at" , function($category){
                        return $category->deleted_at ? "Inactive" : "Active";
                    })
                    ->editColumn("image" , function($category){
                        return view("datatables.views.image" , ["image" =>$category->image]);
                    })
                    ->addColumn("action" , function ($category){
                        return view("datatables.views.categories.action" , compact('category'));
                    })
                    ->editColumn("created_at" , function($category){
                        return $category->created_at->diffForHumans();
                    })
                    ->addIndexColumn()
                    ->make();
            }
            return view("admin.categories.index");
        }
        catch(Exception $e){
            toastr("Something went wrong, please try again" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
