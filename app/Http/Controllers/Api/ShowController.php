<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PostResource;
use App\Models\Post;


class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        return new PostResource($post);
//        return view('admin.post.show', compact('post'));
    }
}
