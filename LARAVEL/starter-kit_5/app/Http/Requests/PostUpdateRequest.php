<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "title" => ["required" , "max:250" , "min:3"],
            "description" => ["required" ],
            "category_id" => ["required" , "exists:categories,id"],
            "moral" => [ "required" ],
            "file.*" => [ 'image' , 'max:5120'],
        ];
    }
}
