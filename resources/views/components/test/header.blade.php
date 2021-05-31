 <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <a href="{{route('game.index')}}" class="nav-link px-2 {{$main_class ?? "text-white"}}">
                            Главная
                        </a>
                    </li>
                    <li>
                        <a href="{{route('market.index')}}" class="nav-link px-2 {{$market_class ?? "text-white"}}">
                            Магазин
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-2 {{$active ?? "text-white"}}">
                            Статьи
                        </a>
                    </li>
                    <li>
                        <a id="test22" href="{{route('friend.index')}}" class="nav-link px-2 {{$friends_class ?? "text-white"}}">
                            Друзья
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-2 {{$library_class ?? "text-white"}}">
                            Библиотека
                        </a>
                    </li>
                </ul>

{{--                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">--}}
{{--                    <li>--}}
{{--                        <a id="test2" href="{{route('friend.index')}}" class="text-white class_element">--}}
{{--                            Друзья--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}



                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="{{route('game.search')}}" method="POST">
                    @csrf
                    <input name="search" type="search" class="form-control form-control-dark" placeholder="Поиск...">
                </form>

                @guest()
                <div class="text-end">
                    <a href="{{route('login')}}">
                        <button type="button" class="btn btn-outline-light me-2">Войти</button>
                    </a>
                    <a href="{{route('register')}}">
                        <button type="button" class="btn btn-warning">Регистрация</button>
                    </a>
                </div>
                @endguest

                @auth()
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <h3>
                            <x-dropdown-link class="nav-link px-2 text-white"
                                             :href="route('logout')"
                                             onclick="event.preventDefault();
                                             this.closest('form').submit();">
                                {{Auth::user()->name }}
                            </x-dropdown-link>
                        </h3>

                    </form>
{{--                    <div class="text-indigo-500">--}}
{{--                        <h3> Вы вошли как {{Auth::user()->name}}</h3>--}}
{{--                    </div>--}}
                @endauth
            </div>
        </div>


    </header>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
{{-- <div id="one" class="hidden">One</div>--}}
{{-- <div id="two">Two</div>--}}
{{-- <button>Click</button>--}}


{{-- <script>--}}
{{--     $('#test2').click(function() {--}}
{{--         test2.classList.remove("text-white");--}}
{{--         test2.classList.add("text-secondary")--}}
{{--     }--}}
{{--     );--}}
{{-- </script>--}}


{{-- <style>--}}
{{--     .hidden {--}}
{{--         display: none;--}}
{{--     }--}}
{{-- </style>--}}

{{-- <script>--}}
{{--     $(function() {--}}
{{--         $('button').click(function() {--}}
{{--             $('#one, #two').toggleClass('hidden');--}}
{{--         });--}}
{{--     });--}}
{{-- </script>--}}

{{-- <script>--}}
{{--     $(function() {--}}
{{--         $('#test2').click(function() {--}}
{{--             $('#test2').removeClass('text-white');--}}
{{--             $('#test2').addClass('text-secondary');--}}
{{--         });--}}
{{--     });--}}
{{-- </script>--}}

{{-- <p id="hui" style="color: #2d3748">--}}
{{--     qwerty--}}
{{-- </p>--}}

{{-- <script>--}}
{{--       el =  document.getElementById('test2')--}}
{{--         el.onclick = function() {--}}
{{--             //this.class = "text-secondary";--}}
{{--             //this.style.color = 'red';--}}
{{--             document.getElementById("test2").classList.remove('text-white');--}}
{{--             document.getElementById("test2").classList.add('text-secondary');--}}
{{--            // this.className('text-secondary');--}}
{{--            // this.style.class= 'nav-link px-2 text-secondary';--}}
{{--             //this.class="nav-link px-2 text-secondary";--}}
{{--     }--}}
{{-- </script>--}}


