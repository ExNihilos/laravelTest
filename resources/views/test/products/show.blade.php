@extends('test.products.layout')

@section('title')
    {{$product['name']}}
@endsection

@section('body')
    <h3>
        {{$product['name']}}
    </h3>
    <div>
        <h4>Цена: {{$product['cost']}}</h4>
        <h4>
            Наличие:
            @if($product['inStock'] === false )
                нет в наличии
            @elseif($product['inStock'] === true)
                есть в наличии
            @endif
        </h4>
        <h4>
            Категория: <a href="{{route('product.index', $category_id)}}">{{$category}}</a>
        </h4>
        <p>
            <span>
                {{$product['desc']}}
            </span>
        </p>
    </div>
@endsection
