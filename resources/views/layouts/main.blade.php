<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    {{--    <link rel="preload" href="/build/assets/app-298ba296.css" as="style">--}}
    {{--    <link rel="preload" href="/build/assets/app-3f9f8a76.js" as="script">--}}
    {{--    <script src="/build/assets/app-3f9f8a76.js" defer></script>--}}
    {{--    <link rel="stylesheet" href="{{asset('css/reset.css')}}">--}}
    {{--    <link rel="stylesheet" href="{{asset('css/reset.css')}}">--}}
    {{--    @vite(['resources/css/reset.css'])--}}

    @vite(['resources/js/app.js', 'resources/sass/app.scss'])


    <title>Document</title>
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            {{--            <nav>--}}
            {{--                <ul>--}}
            {{--                    <li>--}}
            {{--                        <a href="{{route('main.index')}}">Главная</a>--}}
            {{--                    </li>--}}
            {{--                    <li>--}}
            {{--                        <a href="{{route('about.index')}}">О Нас</a>--}}
            {{--                    </li>--}}
            {{--                    <li>--}}
            {{--                        <a href="{{route('contact.index')}}">Контакты</a>--}}
            {{--                    </li>--}}
            {{--                    <li>--}}
            {{--                        <a href="{{route('post.index')}}">Посты</a>--}}
            {{--                    </li>--}}
            {{--                </ul>--}}
            {{--            </nav>--}}
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand fs-3" href="#">Сайт</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link fs-5 {{ request()->is('/') ? "active" : ""}} fw-medium"
                                   aria-current="page"
                                   href="{{route('main.index')}}">Главная</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-5 {{ request()->is('about') ? "active" : ""}} fw-medium"
                                   href="{{route('about.index')}}">О Нас</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-5 {{ request()->is('contacts') ? "active" : ""}} fw-medium"
                                   href="{{route('contact.index')}}">Контакты</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-5 {{ request()->is('posts') ? "active" : ""}} fw-medium"
                                   href="{{route('post.index')}}">Посты</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<main>
    <div class="container">
        @yield('content')
    </div>
</main>

</body>
</html>
