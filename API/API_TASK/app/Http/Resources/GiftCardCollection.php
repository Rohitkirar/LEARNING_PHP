<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GiftCardCollection extends ResourceCollection
{

    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "data"  => $this->collection,
            "links" => [
                "prev" => $this->previousPageUrl(),
                "next" => $this->nextPageUrl(),
                "first" => $this->url(1),
                "last" => $this->url($this->lastPage()),
                "current" => $this->url($this->currentPage()),
                "total" => $this->total(),
            ],
        ];
    }
}
