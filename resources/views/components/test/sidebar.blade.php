<div class="p-3 bg-white" style="float: left; width: 280px;">
    <a href="{{route('game.index')}}" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-5 fw-semibold">Меню</span>
    </a>
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                Магазин
            </button>
            <div class="collapse" id="home-collapse" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark rounded">Overview</a></li>
                    <li><a href="#" class="link-dark rounded">Updates</a></li>
                    <li><a href="#" class="link-dark rounded">Reports</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <a href="{{route('market.index')}}">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                    Все игры
                </button>
            </a>
            <div class="collapse" id="dashboard-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark rounded">Overview</a></li>
                    <li><a href="#" class="link-dark rounded">Weekly</a></li>
                    <li><a href="#" class="link-dark rounded">Monthly</a></li>
                    <li><a href="#" class="link-dark rounded">Annually</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="true">
                Статьи
            </button>
            <div class="collapse" id="orders-collapse" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark rounded">New</a></li>
                    <li><a href="#" class="link-dark rounded">Processed</a></li>
                    <li><a href="#" class="link-dark rounded">Shipped</a></li>
                    <li><a href="#" class="link-dark rounded">Returned</a></li>
                </ul>
            </div>
        </li>
        <li class="border-top my-3"></li>
        <li class="mb-1">

            @auth()
                <a href="{{route('user.edit')}}">
                    <button class="btn btn-toggle align-items-center rounded collapsed"  data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                        Аккаунт
                    </button>
                </a>
            @endauth

            <div class="collapse" id="account-collapse" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark rounded">New...</a></li>
                    <li><a href="#" class="link-dark rounded">Profile</a></li>
                    <li><a href="#" class="link-dark rounded">Settings</a></li>
                    <li><a href="#" class="link-dark rounded">Sign out</a></li>
                </ul>
            </div>


                @yield('testsidebar')

                @if(str_contains(request()->path(), 'market'))
                <div class="container">
                    <h5 class="h-16">
                        Жанры:
                    </h5>
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ml-4 small">
                        @foreach($genres as $genre)
                              <li>
                                  <a href="{{route('market.show', $genre->name)}}" class="link-dark rounded">
                                      {{$genre->name}}
                                  </a>
                              </li>
                        @endforeach
                    </ul>
                 </div>
                <hr>

                <div class="container mt-3">
                    <h5 class="h-16">
                        Теги:
                    </h5>

                    <form action="{{route('market.index')}}">
                        @foreach($tags as $tag)
                            <div >
                                <input id="tag_{{$tag->id}}" name="tags[]" type="checkbox" value="{{$tag->id}}">
                                <label for="tag_{{$tag->id}}">{{$tag->name}}</label>
                            </div>
                        @endforeach
                            <input type="submit" value="Найти" class="btn btn-dark btn-block mt-3" style="width:250px">
                    </form>
                </div>

                @endif
        </li>
    </ul>
</div>
