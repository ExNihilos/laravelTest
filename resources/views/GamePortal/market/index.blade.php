@extends('GamePortal.layouts.app')

@section('title')
    Магазин
@endsection

@section('content')

{{--    @include('components.test.header')--}}
{{--    @extends('components.test.sidebar')--}}
{{--    @include('components.test.sidebar')--}}

{{--    @section('testsidebar')--}}
{{--        test--}}
{{--    @endsection--}}


<h5>
{{--    Выбранные теги:--}}
{{--    @foreach($reqTags as $tag)--}}
{{--    {{$tag->name}},--}}
{{--    @endforeach--}}
</h5>


<div class="container py-5" id="custom-cards">
<div class="d-flex row row-cols-3 align-items-stretch py-5">
        @foreach($games as $game)
            <div class=" pb-3">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-size: cover; background-image: url({{ $game->poster }});">
{{--                <img src="{{ $game->poster }}" class="card-img-top" height="250px" alt="...">--}}

                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <a href="{{route('game.show', [Str::slug($game->name)])}}">
                        <h2 class=" mt-5 mb-4 display-6 lh-1 fw-bold" style="color: black; background-color: #a0aec0">
                           {{$game->name}}
                        </h2>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>


{{--<div class="mt-3 container">--}}
{{--    {{$games->links('vendor.pagination.bootstrap-4')}}--}}
{{--</div>--}}

<div class="container-fluid d-flex h-100 justify-content-center align-items-center p-0">
    {{$games->links('vendor.pagination.bootstrap-4')}}
</div>

<div class="container py-2">
<div class="d-flex row row-cols-3 align-items-stretch py-5">
@foreach($games as $game)
    <div>
        <div class="card bg-dark mb-3">
            <img src="{{ $game->poster }}" class="card-img-top" height="250px" alt="...">
            <div class="card-body">
                <p class="card-text">
                    <a href="{{route('game.show', [Str::slug($game->name)])}}" class="text-white">
                        {{--                    <h2 class="fw-bold" style="color: black; background-color: #a0aec0">--}}
                        {{$game->name}}
                        {{--                    </h2>--}}
                    </a>
                </p>
            </div>
        </div>
    </div>

@endforeach
</div>
</div>
{{--<div class="container">--}}
{{--    @foreach($games as $game)--}}
{{--    <div class="row">--}}
{{--        <div class="col-6" style="background-color: green">--}}
{{--        $game->name--}}
{{--        </div>--}}

{{--        <div class="col-6" style="background-color: #2d3748">--}}
{{--            <div class="card card-cover " style="background-size: cover; background-image: url({{ $game->poster }});">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    @endforeach--}}
{{--</div>--}}


{{--<div class="mt-3 container">--}}
{{--    {{$games->links('vendor.pagination.bootstrap-4')}}--}}
{{--</div>--}}

<div class="container-fluid d-flex h-100 justify-content-center align-items-center p-0">
    {{$games->links('vendor.pagination.bootstrap-4')}}
</div>


@endsection



