<header class="navbar navbar-expand-md bg-primary navbar-overlap d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="{{ route('index') }}" class="text-decoration-none">
            <img src="{{ asset('img/lambang.png') }}" height="50" alt="lambang">
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3 text-white">
                {{ config('app.name') }}
            </h1>
        </a>
        @guest
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item text-white">
                <a href="{{ route('login') }}" class="nav-link d-flex lh-1 text-reset p-0">
                    <div class="d-xl-block ps-2">
                        <div>Masuk</div>
                    </div>
                </a>
            </div>
        </div>
        @endguest
        @auth
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown text-white">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <div class="d-xl-block ps-2">
                        <div>{{ auth()->user()->nama_pengguna }}</div>
                        <div class="mt-1 small text-dark">{{ auth()->user()->peran }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    @can('pengguna-berita')
                    <a href="{{ route('admin.index') }}" class="dropdown-item">Kelola Pengguna</a>
                    @endcan
                    <a href="{{ route('kata-sandi.edit', auth()->user()->nama_pengguna) }}" class="dropdown-item">Ubah
                        Kata Sandi</a>
                    @can('pengguna-berita')
                    <a href="{{ route('berita.index') }}" class="dropdown-item">Berita</a>
                    @endcan
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="return confirm('Apakah anda yakin untuk keluar?')">Keluar</a>
                </div>
            </div>
        </div>
        @endauth
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                <ul class="navbar-nav">
                    @if (Route::currentRouteName()=='index'
                    ||Route::currentRouteName()=='apd'
                    ||Route::currentRouteName()=='pkad'
                    ||Route::currentRouteName()=='kd'
                    ||Route::currentRouteName()=='diepd'
                    ||Route::currentRouteName()=='puem'
                    ||Route::currentRouteName()=='psdattg'
                    ||Route::currentRouteName()=='pspkp'
                    ||Route::currentRouteName()=='ppkp')
                    @auth
                    @canany(['pengguna', 'admin'])
                    @foreach ($pd as $menu => $sub_menu)
                    <li class="nav-item dropdown text-white">
                        <a class="nav-link dropdown-toggle text-white" href="#navbar-help" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-title">
                                {{ $menu }}
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            @foreach ($sub_menu as $route => $item)
                            <a class="dropdown-item" href="{{ route($route) }}">
                                {{ $item }}
                            </a>
                            @endforeach
                        </div>
                    </li>
                    @endforeach
                    @foreach ($kmd as $menu => $sub_menu)
                    <li class="nav-item dropdown text-white">
                        <a class="nav-link dropdown-toggle text-white" href="#navbar-help" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-title">
                                {{ $menu }}
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            @foreach ($sub_menu as $route => $item)
                            <a class="dropdown-item" href="{{ route($route) }}">
                                {{ $item }}
                            </a>
                            @endforeach
                        </div>
                    </li>
                    @endforeach
                    @foreach ($ppmd as $menu => $sub_menu)
                    <li class="nav-item dropdown text-white">
                        <a class="nav-link dropdown-toggle text-white" href="#navbar-help" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-title">
                                {{ $menu }}
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            @foreach ($sub_menu as $route => $item)
                            <a class="dropdown-item {{ $loop->iteration == 2 ? 'text-danger' : null }}"
                                href="{{  $loop->iteration == 2 ? '#' : route($route) }}">
                                {{ $item }}
                            </a>
                            @endforeach
                        </div>
                    </li>
                    @endforeach
                    @foreach ($pkp as $menu => $sub_menu)
                    <li class="nav-item dropdown text-white">
                        <a class="nav-link dropdown-toggle text-white" href="#navbar-help" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-title">
                                {{ $menu }}
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            @foreach ($sub_menu as $route => $item)
                            <a class="dropdown-item" href="{{ route($route) }}">
                                {{ $item }}
                            </a>
                            @endforeach
                        </div>
                    </li>
                    @endforeach
                    @endcanany
                    @can('sekretariat')
                    @foreach ($sekretariat as $menu => $sub_menu)
                    <li class="nav-item dropdown text-white">
                        <a class="nav-link dropdown-toggle text-white" href="#navbar-help" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-title">
                                {{ $menu }}
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            @foreach ($sub_menu as $route => $item)
                            <a class="dropdown-item" href="{{ route($route) }}">
                                {{ $item }}
                            </a>
                            @endforeach
                            @foreach ($lock as $item)
                            <a class="dropdown-item text-danger" href="#">
                                {{ $item }}
                            </a>
                            @endforeach
                        </div>
                    </li>
                    @endforeach
                    @endcan
                    @endauth
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>