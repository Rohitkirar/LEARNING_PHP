<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "gender" => $this->gender , 
            "birth_date" => $this->birth_date,
            "phone_number" => $this->phone_number,
            "username" => $this->username,
            "email" => $this->email,
            "profile_image" => $this->profile_image,
            "created_at" => $this->created_at,

            "giftCards" => GiftCardCollection::make($this->whenLoaded("giftCards")),
            "cashbacks" => CashbackCollection::make($this->whenLoaded("cashbacks")),
        ];
    }
}
