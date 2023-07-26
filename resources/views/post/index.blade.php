@extends('layouts.main')

@section('content')
    <div>
        <div class="my-2">
            {{$posts->withQueryString()->links()}}
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
    <a href=""></a>
@endsection
