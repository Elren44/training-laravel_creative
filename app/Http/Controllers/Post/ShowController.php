<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;


class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        $this->authorize('view', auth()->user());
        return view('post.show', compact('post'));
    }
}
