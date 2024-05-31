<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GiftCardProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "data" => $this->collection,
            "links" => [
                "self" => url()->current(),
                "previous_page_url" => $this->previousPageUrl(),
                "next_page_url" => $this->nextPageUrl(),
                "per_page" => $this->perPage(),
                "current_page" => $this->currentPage(),
            ]
        ];
    }
}
