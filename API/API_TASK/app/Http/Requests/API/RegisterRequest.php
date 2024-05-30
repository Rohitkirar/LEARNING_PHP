<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "first_name" => "required|min:3|max:100",
            "last_name" => "required|min:3|max:100",
            "birth_date" => "required|date|before:-18 years",
            "gender" => "required|in:male,female,other",
            "phone_number" => "required|min:10|max:15|unique:users",
            "username" => "required|min:8|max:16|unique:users",
            "email" => "required|email|unique:users",
            "password" => "required|min:8|max:16|confirmed",
        ];
    }
}
