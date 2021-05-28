@extends('GamePortal.layouts.app')

@section('title')
    {{$game[0]->name}}
@endsection

@section('content')
    {{--    <style>--}}
{{--        * {--}}
{{--            box-sizing: border-box--}}
{{--        }--}}

{{--        html,--}}
{{--        body {--}}
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
{{--            /*transform: translate(-50%, -50%);*/--}}
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


{{--<a data-fancybox="gallery" href="big_1.jpg"><img src="small_1.jpg"></a>--}}
{{--<a data-fancybox="gallery" href="big_2.jpg"><img src="small_2.jpg"></a>--}}


{{--@include('components.test.header')--}}

{{--@include('components.test.sidebar')--}}

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

    <h3>
        Описание:
    </h3>

    <div class="container">

        <h4 class="text-indigo-500">
            {{$descriptions->description}}
        </h4>
    </div>


<div class="container py-5"  id="custom-cards">
    <h2 class="pb-2 border-bottom">Скриншоты</h2>
    <div class="d-flex row row-cols-3 align-items-stretch py-5">

{{--        <a href="#img1"><img src="{{ $screenshot->image}}" alt=""></a>--}}


@foreach($game[0]->short_screenshots as $screenshot)
    <div class="col pb-3">
{{--        <a href="#{{$screenshot->id}}">--}}
        <a data-fancybox="gallery" href="{{$screenshot->image}}">
            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg">
            <img src="{{ $screenshot->image}}">
            </div>
{{--            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-size: cover;--}}
{{--            background-image: url({{ $screenshot->image}});">--}}
{{--            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">--}}
{{--                <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold" style="color: black">--}}
{{--                </h2>--}}
{{--                <ul class="d-flex list-unstyled mt-auto">--}}
{{--                    <li class="me-auto">--}}
{{--                    </li>--}}
{{--                    <li class="d-flex align-items-center me-3">--}}
{{--                        <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>--}}
{{--                    </li>--}}
{{--                    <li class="d-flex align-items-center">--}}
{{--                        <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>--}}
{{--                        <small>3d</small>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
        </a>
{{--        </a>--}}

{{--        <div id="{{$screenshot->id}}" class="popup">--}}
{{--            <a href="#" class="close">X</a>--}}
{{--            <img class="full-img" src="{{$screenshot->image}}" alt="">--}}
{{--        </div>--}}
    </div>
@endforeach

</div>

    <div class="game__movie">
        <div class="game-card-video started">
            <video width="800" height="600" src="{{$trailer->data->max??null}}" controls loop poster="{{$trailer->preview??null}}">
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

<video  width="500" height="400" loop controls="controls" poster="{{$trailer->preview ?? null}}">
{{--    <source src="https://steamcdn-a.akamaihd.net/steam/apps/256667913/movie_max.mp4" type='video/ogg; codecs="theora, vorbis"'>--}}
    <source src="{{$trailer->data->max??null}}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
{{--    <source src="https://steamcdn-a.akamaihd.net/steam/apps/256667913/movie_max.mp4" type='video/webm; codecs="vp8, vorbis"'>--}}
    Тег video не поддерживается вашим браузером.
    <a href="https://steamcdn-a.akamaihd.net/steam/apps/256667913/movie_max.mp4">Скачайте видео</a>.
</video>

    <div class="container py-5"  id="custom-cards">
        <h2 class="pb-2 border-bottom">Отзывы</h2>
        <div class="d-flex row row-cols-3 align-items-stretch py-5">
            <div class="container">
                @foreach($reviews as $review)
                {{$review->text}}
                <div class="pt-3">
                    {{$review->user->name}} - {{$review->user->email}}
                </div>
                    <hr><br>
                @endforeach
            </div>
            <form action="{{route('reviews.store', [$game[0]->name])}}" method="POST">
                @csrf
                <div><textarea name="text" id="text" cols="50" rows="10" placeholder="Введите текст вашего отзыва"></textarea></div>
                <div><input type="submit" class="mt-2 btn btn-warning" value="Отправить отзыв"></div>
            </form>
        </div>
    </div>

@endsection


