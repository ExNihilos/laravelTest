@extends('test/layout')

@section('title')
    {{$title ?? 'Page'}}
@endsection

@section('main')
    Main <br>
    SampleOfQwe
    <br>


    <p>
        <ul>
        @foreach($links as $link)
            <li>
                <a href="http://{{$link['href']}}">{{$link['text']}}</a>
            </li>
        @endforeach
        </ul>
    </p>

    <p>
        <table border="1px">

            <tr style="border: 1px solid black">
                <th>№</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Зарплата</th>
            </tr>

            @foreach($employees as $index=>$employee)
                @if($employee['salary']>2000)
                    <tr style="border: black solid 1px;">
                        <td>
                            {{$index+1}}
                        </td>
                        @foreach($employee as $key=>$value)
                            <td style="border: black solid 1px;">
                                {{$value}}
                            </td>
                        @endforeach
                    </tr>
                @endif
            @endforeach
        </table>
    </p>

    <p>
        <table border="1px">
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Статус</th>
            </tr>

            @foreach($users as $user)
                @if($user['banned']===true)
                    <tr style="background: darkred">
                        @else
                    <tr style="background: green">
                @endif
                    @foreach($user as $value)
                        <td>
                            @if($value === true)
                                Забанен
                            @elseif($value === false)
                                Активен
                            @else
                                {{$value}}
                            @endif
                        </td>
                    @endforeach
                </tr>
              @endforeach
        </table>
    </p>

   <p>
       @foreach($array as $value)
           <input type="text" value="{{$value}}">
       @endforeach
           <select name="select" id="">
               @foreach($array as $value)
                   <option value="">{{$value}}</option>
               @endforeach
           </select>
   </p>


@endsection

@section('sidebar')
    @parent
    Sidebar
@endsection
