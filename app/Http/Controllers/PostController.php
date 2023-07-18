<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    //

    public function index():void {
//       $posts = Post::all()->where("is_published", 0)->first();
       $posts = Post::all()->where("is_published", 1)->first();

       foreach ($posts->attributesToArray() as $post) {
           dump($post);
       }
//       dump($posts->title);
//       dump("likes: $post->likes");
    }
    public function create() {
        $postsArr = [
            [
                'title'=> 'first post from phpstorm',
                'content'=> 'first content from created post',
                'image'=> 'firstsomeimage.jpg',
                'likes'=> 11,
                'is_published'=> 1,
            ],
            [
                'title'=> 'second post from phpstorm',
                'content'=> 'second content from created post',
                'image'=> 'secondsomeimage.jpg',
                'likes'=> 22,
                'is_published'=> 1,
            ]
        ];
//        Post::create([
//            'title'=> 'first post from phpstorm',
//            'content'=> 'first content from created post',
//            'image'=> 'firstsomeimage.jpg',
//            'likes'=> 11,
//            'is_published'=> 1,
//        ]);
        foreach ($postsArr as $item) {
            Post::create($item);
        }
        dd('created');
    }
}
