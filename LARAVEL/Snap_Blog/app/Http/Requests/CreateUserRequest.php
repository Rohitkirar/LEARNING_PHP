<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'first_name'=>'required|min:3|max:20',
            'last_name'=>'required|min:3|max:20',
            'gender'=>'required',
            'date_of_birth'=>'required|before:01/01/2005',
            'email'=>'required|email:rfc,dns',
            'number'=>'required|max:10|min:10',
            'username'=>'required|max:16',
            'password'=>'required|min:8|max:16'

        ];
    }
}
