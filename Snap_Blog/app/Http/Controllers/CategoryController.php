<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();

        return view( 'categories.index' , compact( 'categories' ) );

    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        
    }


    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }


    public function destroy($id)
    {
        
    }
}
