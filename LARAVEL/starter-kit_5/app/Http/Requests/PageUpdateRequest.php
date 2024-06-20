<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageUpdateRequest extends FormRequest
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
            "moral" => [ "required" ],
            "file.*" => [ 'image' , 'max:5120'],
        ];
    }
}
