<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileUpdateController extends Controller
{
        public function __invoke(UserUpdateRequest $request){
        try{
            $user = Auth::user();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->birth_date = $request->birth_date;
            $user->phone_number = $request->phone_number;
            $user->bio = $request->bio;
            if($request->avatar){
                if((file_exists($user->path.basename($user->avatar))))
                    unlink($user->path.basename($user->avatar));
                $user->avatar = $request->avatar->store('uploads/profile' , "public");
            }
            if($user->isDirty()){
                $user->save();
                toastr("User Profile Updated Successfully", "success");
                return redirect()->back();
            }
            toastr("No Changes to Update Profile" , "warning");
            return redirect()->back();
        }catch(\Exception $e){
            toastr("Something went wrong");
            return redirect()->route("user.dashboard");
        }
    }
}
