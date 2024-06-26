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

            return  [   
                        "id" => $this->id,
                        "name" => $this->fullName(),
                        "birth_date" => $this->birth_date,
                        "gender" => $this->gender,
                        "email" => $this->email,
                        "phone_number" => $this->phone_number,
                        "avatar" => $this->profileImage(),
                    ];
        
    }
}
