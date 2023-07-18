<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    //

    public function index(): void
    {
//       $posts = Post::all()->where("is_published", 0)->first();
        $posts = Post::all()->where("is_published", 1)->first();

        foreach ($posts->attributesToArray() as $post) {
            dump($post);
        }
//       dump($posts->title);
//       dump("likes: $post->likes");
    }

    public function create()
    {
        $postsArr = [
            [
                'title' => 'first post from phpstorm',
                'content' => 'first content from created post',
                'image' => 'firstsomeimage.jpg',
                'likes' => 11,
                'is_published' => 1,
            ],
            [
                'title' => 'second post from phpstorm',
                'content' => 'second content from created post',
                'image' => 'secondsomeimage.jpg',
                'likes' => 22,
                'is_published' => 1,
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

    public function update()
    {
        $post = Post::find(5);

        $post->update([
            'title' => 'updated',
            'content' => 'updated',
            'image' => 'updated.jpg',
            'likes' => 22,
            'is_published' => 1,
        ]);
        dd('updated');
    }

    public function delete()
    {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted');
    }

    public function firstOrCreate()
    {
        $anotherPost = [
            'title' => 'some',
            'content' => 'some',
            'image' => 'some.jpg',
            'likes' => 2200,
            'is_published' => 1,
        ];
        $post = Post::firstOrCreate(
            ['title' => 'some'],
            [
                'title' => 'some',
                'content' => 'some',
                'image' => 'some.jpg',
                'likes' => 2200,
                'is_published' => 1,
            ]
        );
        dd($post->content);
    }

    public function updateOrCreate() {
        Post::updateOrCreate(
            ['title' => 'some2'],
            [
                'title' => 'some2',
                'content' => 'some2',
                'image' => 'some2.jpg',
                'likes' => 2200,
                'is_published' => 1,
            ]
        );
        dd('update_or_create');
    }
}
