<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index()
    {
//        $category = Category::find(1);
//        $post = Post::find(1);
//        $tag = Tag::find(1);
//        echo "Посты по категории:";
//        dump($category->posts->toArray());
//        echo "Категории поста: ";
//        dump($post->category->toArray());
//        echo "Теги поста: ";
//        dump($post->tags->toArray());
//        echo "Посты по тегу: ";
//        dump($tag->posts->toArray());
//       $posts = Post::all()->where("is_published", 0)->first();
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);

        $tags = $data['tags'];
        unset($data['tags']);
//        dd($tags, $data);
        $post = Post::create($data);
        $post->tags()->attach($tags);
//        foreach ($tags as $tag) {
//            PostTag::firstOrCreate([
//                'tag_id' => $tag,
//                'post_id' => $post->id
//            ]);
//        }
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
//        $currentPost = $post->attributesToArray();

        return view('post.show', compact('post'));

    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));

    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''


        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
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

    public function updateOrCreate()
    {
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
