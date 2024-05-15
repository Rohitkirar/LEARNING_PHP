<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use App\Models\User;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    // protected $redirect = "/";  //if the request fails it redirects to pass url

    // protected $redirectRoute = "welcome"; //if request fails it redirect to the passed route

    public function attributes(){
        return [
            "email" => "Email Address"
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => "First Name is required" ,
            "first_name.string" => "First Name must be String" ,
            'last_name.required' => "Last Name is required" ,
            "last_name.string" => "Last Name must be String" ,
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'first_name' => ['required', 'max:255'],
            'last_name' => ['required' , 'max:255'],
            'birth_date' => ['required', 'date'],
            'gender' => ['required' , 'in:male,female,other'],
            'phone_number' => ['required' , 'unique:users'  ,'regex:/^((?:[1-9][0-9 ().-]{5,28}[0-9])|(?:(00|0)( ){0,1}[1-9][0-9 ().-]{3,26}[0-9])|(?:(\+)( ){0,1}[1-9][0-9 ().-]{4,27}[0-9]))$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:20', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ];
    }
}

/*
! 'unique : tablename'  or 'unique:'Model::class   //to validate the value is unique in the column of the table commonly used for email, mobile , username columns
! 'before:value' or 'after:value'  // to validate value should be before or after the specify value in validation , also used for date column
! 
*/