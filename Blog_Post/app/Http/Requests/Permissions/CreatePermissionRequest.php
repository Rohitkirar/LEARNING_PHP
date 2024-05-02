<?php

namespace App\Http\Requests\Permissions;

use Illuminate\Foundation\Http\FormRequest;

class CreatePermissionRequest extends FormRequest
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
