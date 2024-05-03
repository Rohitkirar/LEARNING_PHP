<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:male,female,other', 'max:255'],
            'date_of_birth' => ['required' , 'date' , 'before:-18 years'],
            'phone_number' => ['required', 'digits:10', 'unique:users,phone_number,'.auth()->user()->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.auth()->user()->id],
        ];
    }
}
