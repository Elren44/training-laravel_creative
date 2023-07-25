@extends('layouts.main')
@section('content')
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .table-row {
            cursor: pointer;
        }

        .table-row:hover {

        }

    </style>

</head>
<body>
<div>Страница posts</div>
<div>
    <div class="my-2">
        {{$posts->links()}}
    </div>
    <table class="table ">
        <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Заголовок</th>
            <th scope="col">Контент</th>
            <th scope="col">Изображение</th>
            <th scope="col">Лайки</th>
        </tr>
        </thead>
        <tbody>

        @foreach($posts as $post)
            <tr class="table-row" data-href="{{route('post.show', $post->id)}}">

                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->content}}</td>
                <td>{{$post->image}}</td>
                <td>{{$post->likes | 0}}</td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <br>


</div>

<a class="btn btn-primary" href="{{route('post.create')}}">Создать пост</a>
</body>
</html>

@endsection
