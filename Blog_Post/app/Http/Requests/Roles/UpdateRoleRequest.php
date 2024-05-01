<?php

namespace App\Http\Requests\Roles;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{

    public function authorize()
    {
        if(auth()->check())
            return true;
        else
            return false;
    }

    public function rules()
    {
        return [
            "name" => "required" ,
            "slug" => "required"
        ];
    }
}
