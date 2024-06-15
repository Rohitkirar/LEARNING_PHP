<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:25' , 'min:3'],
            'last_name' => ['required', 'string', 'max:25' , 'min:3'],
            'birth_date' => ['required', 'string', 'date' , 'before:-13 years'],
            'gender' => ['required' , 'string' , 'in:male,female,other'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.auth()->id()],
            'phone_number' => ['required', 'string', 'max:15', 'unique:users,phone_number,'.Auth::id() , 'regex:/^(?:[0-9\\-\\(\\)\\/""\\.]\\s?){6,15}[0-9]{1}$/' ,  ],
            'avatar' => ['image' , 'max:10240'],
            'bio' => ["max:500" , 'string'],
        ];
    }
}
