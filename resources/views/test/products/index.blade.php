@extends('test.products.layout')

@section('title')
{{$category['name']}}
@endsection

@section('body')
    <h3>
        {{$category['name']}}
    </h3>
    <ul>
       @foreach($category['products'] as $product)
           <li>
               <span>
                   <a href="{{route('product.show', [$category_id, $loop->index+1])}}">
                       {{$product['name']}}
                   </a>;
               </span>
               <span>
                   Цена: {{$product['cost']}}
               </span>
           </li>
       @endforeach
      </ul>
@endsection
