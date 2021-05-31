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
    <div class="container">
        @foreach($games as $game)
            {{$game->name}} <br>
        @endforeach
    </div>


<div class="mt-3">
    {{$games->links('vendor.pagination.tailwind-custom')}}
</div>

@endsection



