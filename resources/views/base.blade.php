<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <header class="header">
        <a href="/" class="header__logo">
            Политех
        </a>
        <nav class="header__nav">
            <a href="/" class="header__link">Главная</a>
            <a href="/article" class="header__link">Статьи</a>
            @can('create')
                <a href="/article/create" class="header__link">Создание статьи</a>
            @endcan
            @can('comment-admin')
                <a href="/comment/" class="header__link">Все комментарии</a>
            @endcan
        </nav>
        @if (Auth::user() != null)
        <a href="/logout" class="header__link">{{ Auth::user()->name }}</a>
        @else
            <a href="/register" class="header__link">Регистрация</a>
            <a href="/login" class="header__link">Вход</a>
        @endif
    </header>
    <main class="main">
        @yield('content')
    </main>
    <footer class="footer">
        Саканян Армен 221-321
    </footer>
</body>
</html>