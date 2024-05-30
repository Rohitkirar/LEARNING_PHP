<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{


    // public $collects = PostResource::class; //default

    public function toArray($request)
    {
        return  
        [
           "data" => $this->collection,
           "links" => [
                'self' => url()->current(),
                'prev' => $this->previousPageUrl(),
                'next' => $this->nextPageUrl(),
            ]
        ];
    }
}
