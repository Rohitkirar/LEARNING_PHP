<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function messages(){
        return [
            'id.exists' => "Please select correct Category",
            'id.required' => "The category field is required.",
        ];
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'file.*' => [ 'image', 'max:10240'],
            "category_id" => ['required' , 'exists:categories,id'], 
        ];
    }
}
