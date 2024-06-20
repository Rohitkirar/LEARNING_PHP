<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
  public function index()
  {
    try {
      if (request()->ajax()) {
        $categories = Category::latest();

        return DataTables::of($categories)
          ->editColumn('deleted_at', function ($category) {
            return $category->deleted_at ? 'Inactive' : 'Active';
          })
          ->editColumn('image', function ($category) {
            return view('datatables.views.image', ['image' => $category->image]);
          })
          ->addColumn('action', function ($category) {
            return view('datatables.views.categories.action', compact('category'));
          })
          ->editColumn('created_at', function ($category) {
            return $category->created_at->diffForHumans();
          })
          ->addIndexColumn()
          ->make();
      }
      return view('admin.categories.index');
    } catch (Exception $e) {
      toastr('Something went wrong, please try again', 'error');
      return redirect()->route('admin.dashboard');
    }
  }



 public function store(CategoryStoreRequest $request){
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
    public function show($id){
        try{
            $category = Category::findOrFail($id);
            return view("admin.categories.show", compact("category"));
        }catch(Exception $e){
            toastr("something went wrong, please try again" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
    public function edit($id){
        try{
            $category = Category::findOrFail($id);
            return view("admin.categories.edit" , compact("category"));
        }catch(Exception $e){
            toastr("Something went wrong, please try again" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
        public function update(CategoryUpdateRequest $request , $id){
        try{
            $category = Category::findOrFail($id);
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
        public function destroy($id){
        try{
            $category = Category::delete();
            toastr("Category deleted successfully" , 'success');
            return redirect()->back();
        }
        catch(Exception $e){
            toastr("Something went wrong, please try again" , "error");
            return redirect()->route("admin.dashboard");
        }
    }
}
