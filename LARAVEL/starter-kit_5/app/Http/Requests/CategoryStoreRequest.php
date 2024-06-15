<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => ["required" , "min:3" , "max:100"],
            "image" => ["required" , "image" , "max:5024"],
        ];
    }
}
