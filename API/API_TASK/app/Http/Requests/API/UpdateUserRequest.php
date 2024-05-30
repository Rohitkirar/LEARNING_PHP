<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "first_name" => "required|min:3|max:50" ,
            "last_name" => "required|min:3|max:50" ,
            "birth_date" => "required|date|before:-18 years",
            "gender" => "required|in:male, female , other",
            "email" => "required|email|unique:users,email,".Auth::id(),
            "phone_number" => "required|min:10|max:15|unique:users,phone_number,".Auth::id(),
        ];
    }
}
