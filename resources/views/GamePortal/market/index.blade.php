@extends('GamePortal.layouts.app')

@section('title')
    Магазин
@endsection

@section('content')

{{--    @include('components.test.header')--}}
{{--    @extends('components.test.sidebar')--}}
{{--    @include('components.test.sidebar')--}}

{{--    @section('testsidebar')--}}
{{--        HUIGOVNOSOBAKA--}}
{{--    @endsection--}}


    <div class="container">
        @foreach($games as $game)
            {{$game->name}} <br>
        @endforeach
    </div>


    {{$games->links('vendor.pagination.tailwind-custom')}}

@endsection



