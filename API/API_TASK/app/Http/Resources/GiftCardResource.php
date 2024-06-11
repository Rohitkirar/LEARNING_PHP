<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GiftCardResource extends JsonResource
{
    public function toArray($request)
    {
        
        // return parent::toArray($request);
        
        return [
            "id" => $this->id,
            "gift_card_product_id" => $this->gift_card_product_id,
            "purchase_amount" => $this->purchase_amount,
            "amount_left" => $this->amount_left,
            "is_claimed" => $this->is_claimed,
            "expires_at" => $this->expires_at,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "giftCardProduct" => GiftCardProductResource::make($this->whenLoaded("giftCardProduct")) ,
         ];

    }
}
