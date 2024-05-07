<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(){

        $images = Image::all();

        return view("admin.medias.index" , compact("images"));

    }

    public function create(){

        return view("admin.medias.create");

    }

    public function store(Request $request){
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName);
        return response()->json(['success' => $fileName]);
    }
}
