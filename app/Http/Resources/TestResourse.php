<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'image' => $this->image,
            'likes' => $this->likes,
            'category_id' => $this->category_id,
//            'tags' => $this->tags
        ];
    }
}
