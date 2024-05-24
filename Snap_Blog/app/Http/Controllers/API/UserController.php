<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try{

            $users = User::simplePaginate(10);

            return response()->json([
                "status"=>true ,
                "data"=>$users ,
                "message"=>"User Records fetched successfully",
                "status_code"=> 200
            ] , 200);

        }catch(Exception $e){
            return response()->json([
                "status"=>false ,
                "message"=>$e->getMessage(),
                "status_code"=> 404
            ] , 404);
        }
    }

    public function store(CreateUserRequest $request)
    {
        try{
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'username' => $request->username,
                'password' => $request->password,
            ]);

            if($user){
                return response()->json([
                    "status"=>true ,
                    "data"=>$user ,
                    "message"=>"User Record Created Successfully",
                    "status_code"=> 201
                ] , 201);
            }
        }catch(Exception $e){
            return response()->json([
                "status"=>false ,
                "message"=>$e->getMessage(),
                "status_code"=> 400
            ] , 400);
        }
    }

    public function show($id)
    {
        try{
            $user = User::find($id);
            
            if($user)
                return response()->json([
                    "status"=>true ,
                    "data"=>$user ,
                    "message"=>"User found successfully",
                    "status_code"=> 200
                ] , 200);
            
            return response()->json([
                "status"=>false ,
                "message"=>"No User Record found!",
                "status_code"=> 200
            ] , 200); 

        }catch(Exception $e){
            return response()->json([
                "status"=>false ,
                "message"=>$e->getMessage(),
                "status_code"=> 400
            ] , 400);
        }
    }


    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $user = User::find($id);
            
            if($user){
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->birth_date = $request->birth_date;
                $user->gender = $request->gender;
                $user->email = $request->email;
                $user->phone_number = $request->phone_number;
                $user->save();
                return response()->json([
                    "status"=>true ,
                    "message"=>"User Record Updated Successfully",
                    "status_code"=> 200
                ] , 200); 
            }

            return response()->json([
                "status"=>false ,
                "message"=>"No User Record found!",
                "status_code"=> 200
            ] , 200); 

        }catch(Exception $e){
            return response()->json([
                "status"=>false ,
                "message"=>$e->getMessage(),
                "status_code"=> 400
            ] , 400);
        }
        
    }

    public function destroy($id)
    {
        try{
            $user = User::find($id);
            if($user){
                $user->delete();
                return response()->json([
                    "status"=>true ,
                    "message"=>"User Record Deleted Successfully",
                    "status_code"=> 200
                ] , 200);
            }
            return response()->json([
                "status"=>false ,
                "message"=>"No User Record found!",
                "status_code"=> 200
            ] , 200);

        }catch(Exception $e){
            return response()->json([
                "status"=>false ,
                "message"=>$e->getMessage(),
                "status_code"=> 400
            ] , 400);
        }
    }
}
