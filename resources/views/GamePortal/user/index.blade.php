@extends('GamePortal.layouts.app')

@section('content')

{{--@include('components.test.header')--}}

{{--@include('components.test.sidebar')--}}

<div class="container d-flex row row-cols-1">
    {{--<h3>--}}
    {{--    Заявки в друзья:--}}
    {{--</h3>--}}

    <details >
        <summary>  Заявки в друзья: </summary>
        @foreach($senders as $sender)
            <h4>
                {{$sender->name}}

                <a href="{{route('friend.store', ['user' => $sender->id, 'friend'=>Auth::id()])}}" >
                    <input type="button" value="Принять" placeholder="Принять" class="btn btn-warning me-2">
                </a>

                <a href="{{route('friend.deny', ['sender' => $sender->id, 'recipient'=>Auth::id()])}}">
                    <input type="button" value="Отклонить" class="btn me-3">
                </a>
            </h4>
        @endforeach
    </details>





<p>
    <h3>
        Друзья:
    </h3>


    @foreach($friends as $friend)
    <h4>
        {{$friend->name}} - {{$friend->email}}
        <a href="{{route('friends.destroy')}}">
            <button type="button"
                    class="bg-white hover:bg-gray-200 text-gray-700 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                Удалить из друзей
            </button>
        </a>
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
        <input type="submit" value="Добавить в друзья" placeholder="Добавить в друзья" class="btn btn-warning me-2">
    </form>
    </p>
    @endforeach
</p>

</div>

@endsection
