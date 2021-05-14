@extends('test.posts.layout')

@section('title')
    Список страниц
@endsection

@section('main')
    @foreach($posts as $post)
        <div class="post">
            <h2>{{$post['title']}}</h2>
            <div class="info">
                <span class="date">{{$post['date']}}</span>
                <span class="author">{{$post['author']}}</span>
            </div>
            <div class="text">
                {{$post['teaser']}}
            </div>
            <div class="more">
                <a href="{{route('posts.show', $loop->index+1)}}">подробнее...</a>
            </div>
        </div>
    @endforeach
@endsection
