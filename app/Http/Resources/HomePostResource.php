<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomePostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'title'     => $this->title,
            'excerpt'   => \Str::limit(strip_tags($this->body), 150),
            'created_at'=> $this->created_at->diffForHumans(),
        ];
    }
}
