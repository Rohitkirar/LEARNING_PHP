<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "post_id" => ["required" , "exists:posts,id"],
            "title" => ["required" , "max:250" , "min:3"],
            "description" => ["required" ],
            "moral" => [ "required" ],
            "file" => [ 'required' , 'max:5120'],
            "file.*" => [ 'image' , 'max:5120'],
        ];
    }
}