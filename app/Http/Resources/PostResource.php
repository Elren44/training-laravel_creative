<?php

namespace App\Http\Resources;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Tag\TagResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'category' => new CategoryResource($this->category),
            'tags' => TagResource::collection($this->tags)
        ];
    }
}
