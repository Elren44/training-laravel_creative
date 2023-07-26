@extends('layouts.admin')
@section('content')
    <h3>Ваш пост</h3>
    <div>
        id: {{$post->id}}
    </div>
    <div>
        Заголовок: {{$post->title}}
    </div>
    <div>Контент: {{$post->content}}</div>
    <br>
    <div class="row gx-1">
        <div class="col col-2 col-sm-2 col-md-1 mb-2" style="min-width: 100px">
            <a class="btn btn-primary" href="{{route('admin.post.index')}}">Назад</a>
        </div>
        <div class="col col-2 col-sm-2 col-md-1" style="min-width: 100px">
            <a class="btn btn-primary" href="{{route('admin.post.edit', $post->id)}}">Редактировать</a>
        </div>
    </div>
    <div class="mt-3">
        <form action="{{route('admin.post.delete', $post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Удалить</button>
        </form>
        {{--        <a class="btn btn-danger" href="{{route('post.delete', $post->id)}}">Удалить</a>--}}
    </div>
@endsection
