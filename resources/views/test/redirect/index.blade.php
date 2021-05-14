<!doctype html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>

@if($check??null)
    <h3>
        Введено некорректный email!
    </h3>
@endif

<form action="/test/redirect/1" method="POST">
    @csrf
    <input type="email" name="email" value="введите email">
    <input type="submit">
</form>
</p>


</body>
</html>
