<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            "id" => ['required' , 'exists:categories'], 
        ];
    }
}
