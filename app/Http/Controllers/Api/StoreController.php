<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Post\StoreRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;


class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $post = $this->service->store($data);
        return $post instanceof Post ? new PostResource($post) : $post;
    }
}
