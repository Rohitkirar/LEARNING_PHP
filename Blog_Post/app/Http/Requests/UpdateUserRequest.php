<?php

namespace App\Http\Requests;

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
        if(Auth::check())
            return true;
        else
            return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "avatar" => "image|max:10240" ,
            "name" => "required" ,
            "email" => "required|email|unique:users,email,".Auth::id(),
            "phone_number" => "required|min:10|max:10|unique:users,phone_number,".Auth::id(),
        ];
    }
}
