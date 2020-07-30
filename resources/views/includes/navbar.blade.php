<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.index') }}">Post</a>
                </li>
                <form action="{{ route('search') }}" class="form-inline my-2 my-lg-0" method="post">
                    {{ csrf_field() }}
                    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                @role('admin')
                    <li class="nav-item dropdown">
                        <div class="dropdown mr-1">
                            <button type="button" class="btn btn-default dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                              Menu
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                              <a class="dropdown-item" href="{{ route('posts.create') }}">Buat Post</a>
                              <a class="dropdown-item" href="{{ route('category.create') }}">Buat Kategori</a>
                              <a class="dropdown-item" href="{{ route('sektors.create') }}">Buat Sektor</a>
                              <hr>
                              <a class="dropdown-item" href="{{ route('member.create') }}">Data Anggota UMKM Merangin</a>
                              <a class="dropdown-item" href="{{ route('user.index') }}">Data pengguna</a>
                            </div>
                          </div>
                    </li>
                @endrole

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="btn btn-default dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
