<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            "category_id" => 'required' ,
            'content' => 'required|min:100', 
            
            'images.*' => 'required|image|max:10240', //10MB for multiple file
            
            // 'images' => 'required|mimes:jpg,jpeg,png|max:10240' //10MB for single file only
            
        ];
    }
}
