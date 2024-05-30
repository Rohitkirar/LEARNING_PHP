<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            "id" => $this->id ,
            "user_id" => $this->user_id ,
            "caption" => $this->caption ,
            "likes_count" => $this->whenCounted("likes_count"),
            "comments_count" => $this->whenCounted("comments_count"),
            "images" => $this->whenLoaded("images"),
            "user" => UserResource::make($this->whenLoaded("user")),
        ];
    }
}
