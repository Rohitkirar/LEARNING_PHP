<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CreateCategoryRequest;
use App\Http\Requests\API\UpdateCategoryRequest;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        try{
            $categories = Category::paginate(10);

            return response()->json([
                "success"=>true,
                "message" => "Category List Fetched Successfully",
                "payload" => CategoryCollection::make($categories),
                "status"=>200
            ] , 200);
            
        }catch(Exception $e){
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "status" => 404,
            ] , 404);
        }
    }

    public function store(CreateCategoryRequest $request){
        try{

            $category = Category::create([
                "name" => $request->name,
                "image" => $request->file("file")->store("uploads" , "public")
            ]);

            return response()->json([
                "success"=>true,
                "message" => "Category Created Successfully",
                "data" => CategoryResource::make($category),
                "status"=>201
            ] , 201);

        }catch(Exception $e){
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "status" => 404,
            ] , 404);
        }
    }

    public  function show($id){
        try{
            $category = Category::findOrFail($id);

                return response()->json([
                    "success"=>true,
                    "message" => "Category Fetched Successfully",
                    "data" => new CategoryResource($category),
                    "status"=>200
                ] , 200);

        }catch(Exception $e){
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "status" => 404,
            ] , 404);
        }
    }

    public function update(UpdateCategoryRequest $request , $id){
        
        try{
            $category = Category::findOrFail($id);
            
            DB::transaction(function() use ($request , $category){
                $category->name = $request->name;
                $file = $request->file("file");
                if($file){
                    $path = $file->store("uploads" , "public");
                    $category->image = $path;
                }
                $category->save();
            });

            return response()->json([
                "success" => true,
                "message" => "Category Updated Successfully" , 
                "status" => 200
            ] , 200);

        }catch(Exception $e){
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "status" => 404,
            ] , 404);
        }
    }

    public function destroy($id){
        try{
            $category = Category::findOrFail($id);
            
            if($category->delete()){
                return response()->json([
                    "success" => true,
                    "message" => "Category Deleted Successfully",
                    "status" => 200
                ] , 200);
            }else{
                return response()->json([
                    "success" => false,
                    "message" => "Failed to delete category",
                    "status" => 404
                ] , 404);
            }
        }catch(Exception $e){
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "status" => 404,
            ], 404);
        }
    }
}
