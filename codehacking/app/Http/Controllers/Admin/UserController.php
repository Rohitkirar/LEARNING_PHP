<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\UserCreateRequest;
use App\Models\Image;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

use function PHPUnit\Framework\fileExists;

class UserController extends Controller
{

    public function index()
    {
        try {
            if (View::exists("admin.users.index")) {

                $users = User::with("Image")->withTrashed()->latest()->get();

                return view("admin.users.index", compact("users"));
            }
        } catch (Exception $e) {

            toastr($e->getMessage(), "error");
            return redirect()->route("home");
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
                    $user->image()->create(['image' => basename($file->store("images", "public"))]);
                }
            });

            toastr("User Created Successfully!");
            return redirect()->route("users.index");

        } catch (Exception $e) {

            toastr($e->getMessage(), "error");
            return back();
        }
    }

    public function show($id)
    {
        try {

            $user = User::withTrashed()->find($id);
            return view("admin.users.show", compact("user"));

        } catch (Exception $e) {

            toastr($e->getMessage(), "error");
            return redirect()->route("users.index");
        }
    }


    public function edit($id)
    {
        try {

            $user = User::withTrashed()->find($id);
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
            $user->is_active = $request->is_active;
            $file = $request->file("file");
            $userupdate = false;
            if ($user->isDirty()) $userupdate = true;

            DB::transaction(function () use ($user, $file, $userupdate) {

                if ($userupdate) $user->save();

                if ($file) {
                    if ($image = $user->image) {
                        if (file_exists(public_path() . $user->image->image)) unlink(public_path() . $user->image->image);
                    } else $image = new Image();
                    $image->image =  basename($file->store("images", "public"));
                    $user->image()->save($image);
                }
            });

            ($userupdate || $file) ? toastr("User Profile Updated Successfully!") : toastr("No Changes To Update!", "warning");
            return redirect()->route("users.show" , $user->id);
            
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
            return redirect()->route("users.show" , $user->id);

        } catch (Exception $e) {

            toastr($e->getMessage(), "error");
            return redirect()->route("users.index");
            
        }
    }

    public function restore($id)
    {
        try {

            $user = User::withTrashed()->find($id);
            $user->update([ "deleted_at" => null ]);
            toastr("User Data Restored Successfully");
            return redirect()->route("users.show" , $user->id);

        } catch (Exception $e) {

            toastr($e->getMessage(), "error");
            return redirect()->route("users.index");

        }
    }
}
