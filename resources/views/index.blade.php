<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    {{--    <link href="{{asset('css/app.css')}}" rel="stylesheet">--}}

{{--    <style>--}}
{{--        * {--}}
{{--            box-sizing: border-box--}}
{{--        }--}}

{{--        html, body {--}}
{{--            height: 100%;--}}
{{--            padding: 0;--}}
{{--            margin: 0;--}}
{{--        }--}}

{{--        .popup:not(:target) {--}}
{{--            display: none;--}}
{{--        }--}}

{{--        .popup:target {--}}

{{--            display: block;--}}
{{--            position: fixed;--}}
{{--            top: 0;--}}
{{--            left: 0;--}}
{{--            bottom: 0;--}}
{{--            right: 0;--}}
{{--            background: rgba(0,0,0,0.9);--}}
{{--        }--}}

{{--        .full-img {--}}
{{--            position: absolute;--}}
{{--            top: 50%;--}}
{{--            left: 50%;--}}
{{--            transform: translate(-50%, -50%);--}}
{{--        }--}}

{{--        .close {--}}
{{--            position: absolute;--}}
{{--            top: 20px;--}}
{{--            right: 20px;--}}
{{--            font-size: 30px;--}}
{{--            text-decoration: none;--}}
{{--            color: red;--}}
{{--        }--}}
{{--    </style>--}}
</head>
<body>

{{--<a data-fancybox="gallery" href="big_1.jpg">--}}
{{--    <img src="{{asset('images/gta5.jpg')}}">--}}
{{--</a>--}}

{{--<a data-fancybox="gallery" href="https://img5.goodfon.ru/wallpaper/nbig/f/78/more-korabl-parusa.jpg">--}}
{{--       <img src="https://img5.goodfon.ru/wallpaper/nbig/f/78/more-korabl-parusa.jpg" style="width: 400px">--}}
{{--</a>--}}
{{--<a data-fancybox="gallery" href="https://img4.goodfon.ru/wallpaper/nbig/d/9f/skull-and-bones-ship-pirate-ship-game-pirate-kaizoku-flag-su.jpg">--}}
{{--    <img src="https://img4.goodfon.ru/wallpaper/nbig/d/9f/skull-and-bones-ship-pirate-ship-game-pirate-kaizoku-flag-su.jpg" style="width: 400px">--}}
{{--</a>--}}

@include('components.test.header')

@include('components.test.sidebar')


{{--<h2 style="display: inline-block; float: left" class="border-bottom">Игры</h2>--}}

{{--<a href="#img1"><img src="https://million-wallpapers.ru/wallpapers/3/49/small/17695214594850756968.jpg" alt=""></a>--}}

{{--<div id="img1" class="popup">--}}
{{--    <a href="#" class="close">X</a>--}}
{{--    <img class="full-img" src="https://million-wallpapers.ru/wallpapers/3/49/small/17695214594850756968.jpg" alt="">--}}
{{--</div>--}}

<div class="container py-5" id="custom-cards">

    <h2 class="pb-2 border-bottom">Игры</h2>

    <div class="d-flex row row-cols-3 align-items-stretch py-5">


        @foreach($data as $game)
        <div class="col pb-3">
            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-size: cover; background-image: url({{ $game->background_image }});">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold" style="color: black">
                        <a href="{{route('game.show', [$game->slug])}}"> {{$game->name}} </a>
                    </h2>
                    <ul class="d-flex list-unstyled mt-auto">
                        <li class="me-auto">
                            <img src = "{{ 100}}" alt="{{$game->metacritic}}" class="rounded-circle border border-2 border-black" style="color: red; font-size: 30px" width="48" height="48">
                        </li>
                        <li class="d-flex align-items-center me-3">
                            <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                            <small>Earth</small>
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

{{--        <div class="col">--}}
{{--            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-size: cover; background-image: url({{asset('/images/gta5.jpg')}});">--}}
{{--                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">--}}
{{--                    <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Grand Theft Auto 5</h2>--}}
{{--                    <ul class="d-flex list-unstyled mt-auto">--}}
{{--                        <li class="me-auto">--}}
{{--                            <img src="https://github.com/twbs.png" alt="Bootstrap" class="rounded-circle border border-white" width="32" height="32">--}}
{{--                        </li>--}}
{{--                        <li class="d-flex align-items-center me-3">--}}
{{--                            <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>--}}
{{--                            <small>Pakistan</small>--}}
{{--                        </li>--}}
{{--                        <li class="d-flex align-items-center">--}}
{{--                            <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>--}}
{{--                            <small>4d</small>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col">--}}
{{--            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-size: cover; background-image: url('{{asset('/images/gachi.jpg')}}');">--}}
{{--                <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">--}}
{{--                    <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Oh shit, i'm sorry</h2>--}}
{{--                    <ul class="d-flex list-unstyled mt-auto">--}}
{{--                        <li class="me-auto">--}}
{{--                            <img src="https://github.com/twbs.png" alt="Bootstrap" class="rounded-circle border border-white" width="32" height="32">--}}
{{--                        </li>--}}
{{--                        <li class="d-flex align-items-center me-3">--}}
{{--                            <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>--}}
{{--                            <small>California</small>--}}
{{--                        </li>--}}
{{--                        <li class="d-flex align-items-center">--}}
{{--                            <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>--}}
{{--                            <small>5d</small>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>
</body>
</html>
