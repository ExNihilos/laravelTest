@extends('test.posts.layout')

@section('title')
    Извините, страница с id {{$id}} не найдена!
@endsection

@section('main')
    <div class="text">
        Извините, страницы с id {{$id}} не существует!
    </div>
@endsection
