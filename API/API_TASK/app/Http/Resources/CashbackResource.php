<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CashbackResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        
        // return parent::toArray($request);

        return [
            "id" => $this->id,
            "gift_card_id" => $this->gift_card_id,
            "amount" => $this->amount,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "giftCard" => GiftCardResource::make($this->whenLoaded("giftCard")),
        ];
    }
}
