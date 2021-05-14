@extends('test.posts.layout')

@section('title')
    {{$post['title']}}
@endsection

@section('main')
    <div class="info">
        <span class="date">{{$post['date']}}</span>
        <span class="author">{{$post['author']}}</span>
    </div>
    <div class="text">
        {{$post['text']}}
    </div>
@endsection
