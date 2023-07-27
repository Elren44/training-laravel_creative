<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\TestResourse;
use App\Models\Post;


class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;
        $filter = app(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);
        return count($posts) !== 0 ? TestResourse::collection($posts) : ["message" => "Ничего не найдено"];
    }
}
