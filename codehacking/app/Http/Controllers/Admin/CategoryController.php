<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withTrashed()->get();
        return view("admin.categories.index", compact("categories"));
    }

    public function create()
    {

        $categories = Category::select(["name", "created_at"])->get();

        return view("admin.categories.create", compact("categories"));
    }

    public function store(CreateCategoryRequest $request)
    {
        try {
            Category::create(["name" => $request->name]);

            toastr("Category Created Successfully!");
            return back();
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
            return redirect()->route("categories.index");
        }
    }

    public function edit($id)
    {
        $category = Category::withTrashed()->find($id);

        return view("admin.categories.edit", compact("category"));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $category->name = $request->name;
            if ($category->isDirty()) {
                $category->save();
                toastr("Category Updated Successfully!");
            } else {
                toastr("No Changes to Update", "warning");
            }
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
        } finally {
            return redirect()->route("categories.index");
        }
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
            toastr("Category Deleted Successfully!");
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
        } finally {
            return redirect()->route("categories.index");
        }
    }

    public function restore($id)
    {
        try {
            Category::withTrashed()->find($id)->update(["deleted_at" => null]);
            toastr("Category Restored Successfully");
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
        } finally {
            return redirect()->route("categories.index");
        }
    }
}
