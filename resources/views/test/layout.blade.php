<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title')
    </title>
</head>
<body>
<header>
    хедер
</header>
<aside>
    @section('sidebar')
        боковая панель
        @show
</aside>
<main>
    @yield('main')
</main>
<footer>
    футер
</footer>
</body>
</html>
