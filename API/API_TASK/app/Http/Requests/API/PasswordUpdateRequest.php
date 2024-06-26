<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
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
            "old_password" => "required|min:8|max:16",
            "new_password" => "required|min:8|max:16|different:old_password",
        ];
    }
}
