<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CreateGiftCardProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => "required|min:3|max:100",
            "code" => "required|min:5|max:16|unique:gift_card_products",
            "categories.*" => "required|exists:categories,id" ,
            "categories" => "required|exists:categories,id", 
            "cashback_percentage" => "required|min:0|max:100",
            "user_cashback_percentage" => "required|min:0|max:100",
            "description" => "required|min:50|max:1000",
            "status" => "required|in:active,inactive",
            "image" => "required|image|max:2048",
            "min_price" => "required|min:0|lt:max_price",
            "max_price" => "required|max:100000|gt:min_price",
            "sequence" => "required|gt:0"
        ];
    }
}
