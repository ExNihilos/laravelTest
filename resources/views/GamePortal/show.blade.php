<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
@include('components.test.header')

@include('components.test.sidebar')

<br>
<h3>
    Название: {{$game[0]->name}}
</h3>

<h3>
    Metacritic: {{$game[0]->metacritic}}
</h3>

<h3>
    Дата выхода: {{$game[0]->released}}
</h3>

<div class="container py-5"  id="custom-cards">

    <h2 class="pb-2 border-bottom">Скриншоты</h2>

    <div class="d-flex row row-cols-3 align-items-stretch py-5">

@foreach($game[0]->short_screenshots as $screenshot)
    <div class="col pb-3">
        <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-size: cover;
            background-image: url({{ $screenshot->image}});">
            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold" style="color: black">
                </h2>
                <ul class="d-flex list-unstyled mt-auto">
                    <li class="me-auto">
                    </li>
                    <li class="d-flex align-items-center me-3">
                        <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                    </li>
                    <li class="d-flex align-items-center">
                        <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
                        <small>3d</small>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endforeach

</div>
    <div class="game__movie">
        <div class="game-card-video started">
            <video width="800" height="600" src="https://steamcdn-a.akamaihd.net/steam/apps/256667913/movie_max.mp4" controls loop poster="https://api.rawg.io/media/crop/600/400/movies/cc6/cc6b8554ff86691f2e9f1cb30810c19c.jpg">
            </video>
{{--            <video class="" playsinline="" loop=""--}}
{{--                   src="https://steamcdn-a.akamaihd.net/steam/apps/256667913/movie_max.mp4">--}}
{{--            </video>--}}
            <div class="game-card-video-preview started"
                 style="background-image: url('https://api.rawg.io/media/crop/600/400/movies/cc6/cc6b8554ff86691f2e9f1cb30810c19c.jpg');">
            </div>
        </div>
    </div>
</div>

<video  width="500" height="400" loop controls="controls" poster="https://api.rawg.io/media/crop/600/400/movies/cc6/cc6b8554ff86691f2e9f1cb30810c19c.jpg">
{{--    <source src="https://steamcdn-a.akamaihd.net/steam/apps/256667913/movie_max.mp4" type='video/ogg; codecs="theora, vorbis"'>--}}
    <source src="https://steamcdn-a.akamaihd.net/steam/apps/256667913/movie_max.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
{{--    <source src="https://steamcdn-a.akamaihd.net/steam/apps/256667913/movie_max.mp4" type='video/webm; codecs="vp8, vorbis"'>--}}
    Тег video не поддерживается вашим браузером.
    <a href="https://steamcdn-a.akamaihd.net/steam/apps/256667913/movie_max.mp4">Скачайте видео</a>.
</video>
</body>
</html>
