@extends('test.products.layout')

@section('body')
    @foreach($categories as $category)
       <p>
           <a href="{{route('product.index', $loop->index+1)}}">{{$category['name']}}</a>
           Кол-во товаров:{{count($category['products'])}}
       </p>
    @endforeach
@endsection
