<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    //

    public function index() {
       $post = Post::all()->find(1);
       dump( "title: $post->title");
       dump("likes: $post->likes");
    }
}
