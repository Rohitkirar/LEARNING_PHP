<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\UserCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view("admin.users.index" , compact("users"));
    }

    public function create()
    {
        return view("admin.users.create" );
    }

    public function store(UserCreateRequest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name ,
            'last_name' => $request->last_name ,
            'date_of_birth' => $request->date_of_birth ,
            'gender' => $request->gender ,
            'email' => $request->email ,
            'username' => $request->username ,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password)
        ]);

        if($user)
            toastr("User Created Successfully!");
        else
            toastr("Failed to Create User!" , "danger");

        return redirect()->route("users.index");
    }

    public function show(User $user)
    {
        return view("admin.users.show" , compact("user"));
    }


    public function edit(User $user)
    {
        return view("admin.users.edit" , compact("user"));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;

        if($user->isDirty()){
            $user->save();
            toastr("User Profile Update Successfully!");
            return redirect()->route("users.index");
        }

        toastr("No Changes To Update!" , "warning" );
        return back();
    }


    public function destroy(User $user)
    {
        $user->delete();
        toastr("User Deleted Successfully");
        return view("admin.users.index");
    }
}
