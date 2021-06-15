@extends('GamePortal.layouts.app')

@section('title')
    {{$developer->name}}
@endsection

@section('content')

    <h2 class="mt-2">
        {{$developer->name}}
    </h2>
    <br>
    <h4>
        Рейтинг: {{$developer->rating}}
    </h4>

    <h4>
        Кол-во игр: {{count($developer->games)}}

    </h4>

    <h2>
        Игры
    </h2>

    <div class="container ">

{{--        <h2 class="pb-2 border-bottom">Игры</h2>--}}

        <div class="d-flex row row-cols-3 align-items-stretch py-2">

        @foreach($developer->games as $game)
            <div class="col pb-3">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-size: contain; background-image: url({{ $game->poster }});">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold" style="color: black">
                            <a href="{{route('game.show', [Str::slug($game->name)])}}"> {{$game->name}} </a>
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
    </div>
    </div>
{{--    {{$games->links('vendor.pagination.tailwind-custom')}}--}}

@endsection
