<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserResourceController extends Controller
{
    public function index(){

        $users = User::with("image")->cursorPaginate(10);
        
        return response()->json([
            "success" => true,
            "message"=>"User Records fetched successfully",
            "data" => UserResource::collection($users)->response()->getData(true),
            "status_code"=>200
        ] , 200);
    }

    public function show(User $user){

        $user = $user->load("image");
        
        return response()->json([
            "success" => true,
            "message"=>"User Record fetched successfully",
            "data" => new UserResource($user),
            "status_code"=>200
        ] , 200);
    }

    public function collectionIndex(){
        
        $users = User::with("image")->simplePaginate(10);

        return  new UserCollection($users);
    }
}
