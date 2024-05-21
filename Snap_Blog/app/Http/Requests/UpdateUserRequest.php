<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
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
            'phone_number' => ['required' , 'unique:users,phone_number,'.Auth::id()  ,'regex:/^((?:[1-9][0-9 ().-]{5,28}[0-9])|(?:(00|0)( ){0,1}[1-9][0-9 ().-]{3,26}[0-9])|(?:(\+)( ){0,1}[1-9][0-9 ().-]{4,27}[0-9]))$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.Auth::id()],
            'password' => ['required'],
            'profile' => ["mimes:jpg,jpeg,png" , "max:1024"],
        ];
    }
}
