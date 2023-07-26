<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
    <title>Document</title>
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="d-flex justify-between align-items-center">
                <nav class="navbar navbar-expand-lg navbar-light bg-light flex-fill">
                    <div class="container-fluid">
                        <a class="navbar-brand fs-3" href="#">Сайт</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link fs-5 {{ request()->is('/') ? "active" : ""}} fw-medium"
                                       aria-current="page"
                                       href="{{route('home')}}">Главная</a>
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

                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if (Auth::user() !== null && Auth::user()->role === 'admin')
                                    <a class="dropdown-item"
                                       href="{{route('admin.index')}}">Админка</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>

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
