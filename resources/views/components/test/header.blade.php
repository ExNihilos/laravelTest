 <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control form-control-dark" placeholder="Поиск...">
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
                    <div class="text-indigo-500">
                        <h3> Вы вошли как {{Auth::user()->name}}</h3>
                    </div>
                @endauth
            </div>
        </div>
    </header>

