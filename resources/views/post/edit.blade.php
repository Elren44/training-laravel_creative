@extends('layouts.main')
@section('content')
    <a class="btn btn-primary mb-5" href="/posts">Назад</a>
    <h3>Редактирование поста</h3>
    <div>
        <form method="post" action="{{route('post.update', $post->id )}}">
            @csrf
            @method('patch')
            <div class="mb-3 form-group">
                <label for="title" class="form-label">Заголовок поста</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Заголовок"
                       value="{{$post->title}}">
            </div>
            <div class="mb-3 form-group">
                <label for="content" class="form-label">Контент поста</label>
                <textarea type="text" name="content" id="content" class="form-control" placeholder="Контент"
                >{{$post->content}}</textarea>
            </div>
            <div class="mb-3 form-group">
                <label for="content" class="form-label">Ссылка на изображение</label>
                <input type="text" name="image" id="image" class="form-control" placeholder="Изображение"
                       value="{{$post->image}}">
            </div>
            <div class="mb-3 form-group">
                <label for="category_id" class="form-label">Категория</label>
                <select class="form-select" name="category_id" aria-label="Default select example">
                    @foreach($categories as $category)
                        <option
                            {{$category->id === $post->category->id ? ' selected' : ''}}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Теги</label>
                <select class="form-select" name="tags[]" multiple>
                    @foreach($tags as $tag)
                        <option
                            @foreach($post->tags as $postTag)
                                {{$tag->id === $postTag->id ? ' selected' : ''}}
                            @endforeach
                            value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>

            </div>

            <button type="submit" class="btn btn-primary mt-3">Обновить</button>
        </form>
    </div>
@endsection
