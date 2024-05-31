<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserLoginResource extends JsonResource
{

    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "data" => UserResource::make($this),
            "access_token" => $this->whenHas("access_token"),
        ];

    }
}
