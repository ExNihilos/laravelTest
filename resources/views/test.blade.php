<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>TEST</title>
</head>
<body>
{{--<p>--}}
{{--    <link rel="stylesheet" href="{{$href??null}}">--}}
{{--    <a href="{{$href??null}}">{{$text}}</a>--}}
{{--</p>--}}

{{--<h3>--}}
{{--    Текущая дата: {{date_format(now(),'d.m.Y')}}--}}
{{--</h3>--}}


{{--@foreach($arr as $value)--}}
{{--    <p>--}}
{{--        {{$value}}--}}
{{--    </p>--}}
{{--@endforeach--}}

{{--{{count($arr)}}--}}

{{--    <h2>--}}
{{--        {{$city ? $city : 'Москва'}}--}}
{{--    </h2>--}}
{{--    <h2>--}}
{{--        {{$city ?? 'Москва'}}--}}
{{--    </h2>--}}


{{--<p>--}}
{{--{{$location['country'] ?? 'Россия'}}--}}
{{--</p>--}}

{{--<p>--}}
{{--    {{$location['city'] ?? 'Москва'}}--}}
{{--</p>--}}


{{--<p>--}}
{{--    {{($day??date('d')).'.'.($month??date('m')).'.'.($year??date('y'))}}--}}
{{--</p>--}}


{{--{!!$str !!}--}}

{{--@php--}}
{{--echo 12+35 . "<br>";--}}
{{--$num1=4;--}}
{{--echo $num1*10--}}
{{--@endphp--}}

{{--<p>--}}
{{--    {{$dayofweak%=7}}--}}
{{--    @if($dayofweak == 0)--}}
{{--        Воскресенье--}}
{{--    @elseif($dayofweak == 6)--}}
{{--        Суббота--}}
{{--    @elseif($dayofweak == 5)--}}
{{--        Пятница--}}
{{--    @elseif($dayofweak == 4)--}}
{{--        Четверг--}}
{{--    @elseif($dayofweak == 3)--}}
{{--        Среда--}}
{{--    @elseif($dayofweak == 2)--}}
{{--        Вторник--}}
{{--    @elseif($dayofweak == 1)--}}
{{--        Понедельник--}}
{{--    @endif--}}
{{--</p>--}}

{{--<p>--}}
{{--    @if($numofmonth==12 || $numofmonth>=1 && $numofmonth<=2)--}}
{{--        Зима--}}
{{--    @elseif($numofmonth>=3 && $numofmonth<=5)--}}
{{--        Весна--}}
{{--    @elseif($numofmonth>=6 && $numofmonth<=8)--}}
{{--        Лето--}}
{{--    @elseif($numofmonth>=9 && $numofmonth<=11)--}}
{{--        Осень--}}
{{--    @else Это не месяц--}}
{{--    @endif--}}
{{--</p>--}}

{{--<p>--}}
{{--    @unless($age>=18)--}}
{{--        Несовершеннолетний--}}
{{--    @endunless--}}
{{--</p>--}}

{{--<p>--}}
{{--    @if(count($arr)>0)--}}
{{--        {{array_sum($arr)}}--}}
{{--    @else--}}
{{--        Массив пуст--}}
{{--    @endif--}}
{{--</p>--}}

<ul>
    @foreach($numArr as $value)
        <li>
            {{sqrt($value)}}
        </li>
    @endforeach
</ul>

<ul>
    @foreach($wordArr as $key=>$value)
        <li>
            [{{$key+1}}] {{$value}}
        </li>
    @endforeach
</ul>

Чётные элементы:
<ul>
    @foreach($numArr as $key=>$value)
        @if($value%2==0)
            <li>
                {{$value}}
            </li>
        @endif
    @endforeach
</ul>

@if(is_array($data))
    Это массив
   <ul>
       @foreach($data as $value)
           <li>
               {{$value}}
           </li>
       @endforeach
   </ul>

@else
    Это не массив
    <p>
        {{$data}}
    </p>
@endif

<table>
        @for($i=0, $k=1; $i<5; $i++)
            <tr>
                @for($j=0; $j<5; $j++, $k++)
                    <td >
                        {{$tableArr[$k]}}
                    </td>
                @endfor
            </tr>
        @endfor
</table>


@isset($var1)
    Arrr
@endisset

@empty($var1)
    QQQ
@endempty

@auth
     Пользователь аутентифицирован
@endauth

@guest
    // Пользователь не аутентифицирован
@endguest


<p>
<table border="1px">
    @foreach($employees as $employee)
        <tr style="border: 1px solid black; " >
            @foreach($employee as $value)
                <td >
                    {{$value}}
                </td>
            @endforeach
        </tr>
    @endforeach
</table>
</p>



<p>
    <ul>
        @foreach($wordArr as $words)
            @if($loop->first)
                <li style="background: aquamarine" >
                    [{{$loop->index+1}}]: {{$words}}

        @elseif($loop->last)
                        <li style="background:slateblue"  >
                            [{{$loop->index+1}}]: {{$words}}

        @else
                                <li>
                           [{{$loop->index+1}}]: {{$words}}
                        </li>
        @endif
        @endforeach
    </ul>
</p>



<p>
    @for($i=1; $i<=10; $i++)
         <p>
            @for($j=1; $j<=10; $j++)
                {{$j}}
            @endfor
         </p>
    @endfor
</p>


{{--@forelse($arrnew as $value)--}}{{-- ?????--}}
{{--<p>--}}
{{--    {{$value}}--}}
{{--</p>--}}
{{--@empty--}}
{{--    <p>--}}
{{--        Массив пуст--}}
{{--    </p>--}}
{{--@endforelse--}}













</body>
</html>
