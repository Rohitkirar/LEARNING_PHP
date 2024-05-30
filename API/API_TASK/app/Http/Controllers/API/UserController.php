<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\PasswordUpdateRequest;
use App\Http\Requests\API\UpdateUserRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function update(UpdateUserRequest $request)
    {

        try {
            $user = Auth::user();
            $user->update([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "gender" => $request->gender,
                "birth_date" => $request->birth_date,
                "email" => $request->email,
                "phone_number" => $request->phone_number,
            ]);
            return response()->json([
                "success" => true,
                "message" => "User Data Updated Successfully",
                "status" => 200
            ] , 200);
        } catch (Exception $e) {
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "data" => [],
                "status" => 404
            ] , 404);
        }
    }

    public function passwordUpdate(PasswordUpdateRequest $request)
    {
        try {
            $user = Auth::user();
            if (password_verify($request->old_password, $user->password)) { #Hash::check()
                $user = $user->update([
                    "password" =>  $request->new_password,
                ]);
                return response()->json([
                    "success" => true,
                    "message" => "Password Updated Successfully",
                    "status" => 200
                ] , 200);
            }
            return response()->json([
                "success" => false,
                "message" => "Incorrect Password",
                "status" => 404
            ] , 404);
        } catch (Exception $e) {
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "data" => [],
                "status" => 404
            ]);
        }
    }
}
