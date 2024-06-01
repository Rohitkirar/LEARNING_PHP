<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGiftCardProductRequest extends FormRequest
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
        $id = $this->route("product");
        return [
            "name" => "required|min:3|max:100",
            "code" => "required|min:5|max:16|unique:gift_card_products,code,".$id->id,
            "categories.*" => "required|exists:categories,id" ,
            "categories" => "required|exists:categories,id", 
            "cashback_percentage" => "required|min:0|max:100",
            "user_cashback_percentage" => "required|min:0|max:100",
            "description" => "required|min:50|max:1000",
            "status" => "required|in:active,inactive",
            "image" => "image|max:2048",
            "min_price" => "required|min:0|lt:max_price",
            "max_price" => "required|max:100000|gt:min_price",
            "sequence" => "required|gt:0"
        ];
    }
}
