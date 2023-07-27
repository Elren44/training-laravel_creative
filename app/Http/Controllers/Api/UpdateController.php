<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\Api\Post\UpdateRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;


class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
//        dd($data);
        $post = $this->service->update($post, $data);
        return $post instanceof Post ? new PostResource($post) : $post;
//        return redirect()->route('admin.post.show', $post->id);
    }


}
