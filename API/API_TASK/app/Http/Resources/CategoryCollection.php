<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{

    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "data" => $this->collection,
            "links" => [
                "prev" => $this->previousPageUrl(),
                "next" => $this->nextPageUrl(),
                "current" => $this->currentPage(),
                "per_page" => $this->perPage(),
                "total" => $this->total(),
                "last_page" => $this->url($this->lastPage()),
            ]
        ];
    }
}
