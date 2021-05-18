@extends('GamePortal.layouts.app')

@section('content')

@include('components.test.header')

@include('components.test.sidebar')

<h3>
    Заявки в друзья:
</h3>

@foreach($senders as $sender)
<h4>
    {{$sender->name}} - {{$sender->email}}
</h4>
<a href="{{route('friend.store', ['user' => $sender->id, 'friend'=>Auth::id()])}}" >
    <input type="button" value="Принять" placeholder="Принять">
</a>

<a href="{{route('friend.deny', ['sender' => $sender->id, 'recipient'=>Auth::id()])}}">
    <input type="button" value="Отклонить" placeholder="Отклонить">
</a>
@endforeach


<p>
    <h3>
        Друзья:
    </h3>

    @foreach($friends as $friend)
    <h4>
        {{$friend->name}} - {{$friend->email}}
    </h4>
    @endforeach
</p>



<p>
    <h3>
        Все пользователи:
    </h3>
    @foreach($users as $user)
    <p>
        <h4>
            {{$user->name}}
        </h4>
        <h4>
            {{$user->email}}
        </h4>
    <form action="{{route('user.friendrequest', ['sender'=>Auth::id(), 'recipient'=>$user->id])}}" method="POST">
        @csrf
        <input type="submit" placeholder="Добавить в друзья">
    </form>
    </p>
    @endforeach
</p>



@endsection
