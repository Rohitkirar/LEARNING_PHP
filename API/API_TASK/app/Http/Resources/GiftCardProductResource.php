<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GiftCardProductResource extends JsonResource
{

    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'name' => $this->name,
            "code" => $this->code,
            'description' => $this->description,
            "categories" => CategoryResource::collection($this->whenLoaded("categories")),
            "cashback" => $this->cashback,
            "status" => $this->status,
            "image" => $this->image,
            "max_price" => $this->max_price,
            "min_price" => $this->min_price,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];  

    }
}
