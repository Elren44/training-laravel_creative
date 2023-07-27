<?php

namespace App\Http\Controllers;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\TestResourse;
use App\Models\Post;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;
//        $post = Post::find(2);
        $filter = app(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);
//        return isset($posts) ? new TestResourse($post) : "Ничего не найдено";
        return count($posts) !== 0 ? TestResourse::collection($posts) : ["message" => "Ничего не найдено"];
    }
}
