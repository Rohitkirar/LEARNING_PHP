<?php

namespace App\Http\Requests\Roles;

use Illuminate\Foundation\Http\FormRequest;

use function PHPSTORM_META\elementType;

class CreateRoleRequest extends FormRequest
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
