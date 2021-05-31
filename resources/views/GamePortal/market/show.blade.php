@extends('GamePortal.layouts.app')

@section('title')
    Магазин
@endsection

@section('content')

{{--    @include('components.test.header')--}}

{{--    @include('components.test.sidebar')--}}

    <div class="container">
        @foreach($games as $game)
            {{$game->name}} <br>
        @endforeach
    </div>


    {{$games->links('vendor.pagination.tailwind-custom')}}

@endsection
