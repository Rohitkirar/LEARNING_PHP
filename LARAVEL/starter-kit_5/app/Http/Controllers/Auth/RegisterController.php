<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    use RegistersUsers;

    //overwriting method
    public function showRegistrationForm()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('auth.register', ['pageConfigs' => $pageConfigs]);
    }

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:25' , 'min:3'],
            'last_name' => ['required', 'string', 'max:25' , 'min:3'],
            'birth_date' => ['required', 'string', 'date' , 'before:-13 years'],
            'gender' => ['required' , 'string' , 'in:male,female,other'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'regex:/^[a-zA-Z0-9_]{3,20}$/' , 'max:16', 'unique:users'],
            'phone_number' => ['required', 'string', 'regex:/^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/' ,  'max:15', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['image' , 'max:10240'],
            'bio' => ["max:500" , 'string'],
        ]);
    }

    protected function create(array $data)
    {
        try{
            return User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'gender' => $data['gender'],
                'birth_date' => $data['birth_date'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
                'username' => $data['username'],
                'password' => $data['password'],
                'bio' => $data['bio'] , 
                'avatar' => $data['avatar'] ? $data['avatar']->store("uploads/profile" , 'public') : null,
            ]);
        }
        catch(Exception $e){
            toastr("Something went wrong" , "error");
            return redirect()->route("register");
        }

    }
}
