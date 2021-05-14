<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('forms.test1')}}" method="POST">
    @csrf
    <input type="text" name="number1"><br>
    <input type="text" name="number2"><br>
    <input type="text" name="number3"><br>

    <input type="submit">
</form>


{{--<p>--}}
{{--    <ul>--}}
{{--        @foreach($monthDays as $day)--}}
{{--            <li @if($day == $currentDay) class="active" style="background: #718096" @endif>--}}
{{--                {{$day}}--}}
{{--            </li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
{{--</p>--}}




{{--<p>--}}
{{--<ul>--}}
{{--    @foreach($array ?? [] as $value)--}}
{{--        <li>--}}
{{--            {{$value}}--}}
{{--        </li>--}}
{{--    @endforeach--}}

{{--</ul>--}}
{{--</p>--}}

{{--<p>--}}
{{--<form action="{{route('forms.test2')}}" method="POST">--}}
{{--    @csrf--}}
{{--    <table>--}}
{{--    <tr>--}}
{{--        <td>--}}
{{--            <label for="name">Имя:</label>--}}
{{--        </td>--}}
{{--        <td>--}}
{{--            <input type="text" id="name" name="name"><br>--}}
{{--        </td>--}}
{{--    </tr>--}}

{{--    <tr>--}}
{{--        <td>--}}
{{--            <label for="surname">Фамилия:</label>--}}
{{--        </td>--}}
{{--        <td>--}}
{{--            <input type="text" id="surname" name="surname"><br>--}}
{{--        </td>--}}
{{--    </tr>--}}

{{--    <tr>--}}
{{--        <td>--}}
{{--            <label for="email">Е-mail:</label>--}}
{{--        </td>--}}
{{--        <td>--}}
{{--            <input type="email" id="email" name="email"><br>--}}
{{--        </td>--}}
{{--    </tr>--}}

{{--    <tr>--}}
{{--        <td>--}}
{{--            <label for="login">Логин:</label>--}}
{{--        </td>--}}
{{--        <td>--}}
{{--            <input type="text" id="login" name="login"><br>--}}
{{--        </td>--}}
{{--    </tr>--}}

{{--    <tr>--}}
{{--        <td>--}}
{{--            <label for="password">Пароль:</label>--}}
{{--        </td>--}}
{{--        <td>--}}
{{--            <input type="password" id="password" name="password">--}}
{{--        </td>--}}
{{--    </tr>--}}

{{--    <tr>--}}
{{--       <td>--}}
{{--           <input type="submit" value="Отправить">--}}
{{--       </td>--}}
{{--    </tr>--}}
{{--    </table>--}}
{{--</form>--}}

{{--</p>--}}

{{--<p>--}}
{{--    <ul>--}}
{{--        @foreach($data??[] as $value)--}}
{{--            <li>--}}
{{--                {{$value}}--}}
{{--            </li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
{{--</p>--}}


{{--<p>--}}
{{--    Первый заход на страницу:{{$relCount}}--}}
{{--</p>--}}

<p>
<ul>
    @foreach($arr as $value)
        <li>
            {{$value}}
        </li>
    @endforeach
</ul>
</p>

<p>
   TEST: {{$test}}
</p>

<p>
    @foreach(session()->all() as $value)
        <li>
            {{$value}}
        </li>
    @endforeach
</p>

</body>
</html>
