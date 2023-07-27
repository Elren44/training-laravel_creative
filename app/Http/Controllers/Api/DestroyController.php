<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\PostTag;


class DestroyController extends BaseController
{
    public function __invoke(Post $post)
    {
        $postTag = PostTag::where('post_id', $post->id)->delete();
//        dump($postTag->toArray());
//        $postTag->delete();
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
