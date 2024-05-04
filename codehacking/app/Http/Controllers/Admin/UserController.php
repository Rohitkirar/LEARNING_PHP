<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\UserCreateRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{

    public function index()
    {
        try {
            if(View::exists("admin.users.index")){

                $users = User::with("Image")->get();

                return view("admin.users.index", compact("users"));
            
            }
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
        }
    }

    public function create()
    {
        try {
            return view("admin.users.create");
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
            return redirect()->route("users.index");
        }
    }

    public function store(UserCreateRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $user = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'date_of_birth' => $request->date_of_birth,
                    'gender' => $request->gender,
                    'email' => $request->email,
                    'username' => $request->username,
                    'phone_number' => $request->phone_number,
                    'password' => Hash::make($request->password)
                ]);

                $file = $request->file('file');
                if ($file) {
                    $filename = $file->getClientOriginalName();
                    $file->storeAs("images", $filename, "public");
                    $user->image()->create(['image' => $filename]);
                }

                toastr("User Created Successfully!");
                return redirect()->route("users.index");
            });
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
            return back();
        }
    }

    public function show(User $user)
    {
        try {
            return view("admin.users.show", compact("user"));
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
            return redirect()->route("users.index");
        }
    }


    public function edit(User $user)
    {
        try {
        
            return view("admin.users.edit", compact("user"));
        
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
            return redirect()->route("users.index");
        }
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->gender = $request->gender;
            $user->date_of_birth = $request->date_of_birth;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;

            $file = $request->file('file');

            DB::transaction(function () use ($user, $file) {
                if ($user->isDirty()) {
                    $user->save();
                    toastr("User Profile Updated Successfully!");
                }
                if ($file) {
                    $filename = $file->getClientOriginalName();
                    $file->storeAs("images", $filename, "public");
                    $user->image = $filename ;
                    $user->save();
                    if ($user->isClean())
                        toastr("User Profile Image Updated Successfully!");
                }
                if ($user->isDirty() || $file)
                    return redirect()->route("users.index");
                else {
                    toastr("No Changes To Update!", "warning");
                    return back();
                }
            });
        } catch (Exception $e) {
            toastr($e->getMessage(), 'error');
            return redirect()->route("users.index");
        }
    }


    public function destroy(User $user)
    {
        try {
            $user->delete();
            toastr("User Deleted Successfully");
            return view("admin.users.index");
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
            return redirect()->route("users.index");
        }
    }
}
