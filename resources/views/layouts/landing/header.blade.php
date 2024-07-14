<header id="header" class="header sticky-top">

    <div class="branding d-flex align-items-center">

        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="{{ asset('landing/') }}/assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Stunting</h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home') }}" class="{{ Request::routeIs('home') ? 'active' : '' }}">Home</a></li>
                    <li><a href="/#about" class="{{ Request::is('#about') ? 'active' : '' }}">About</a></li>
                    <li><a href="/#services" class="{{ Request::is('#services') ? 'active' : '' }}">Layanan</a></li>
                    <li><a href="/#appointment" class="{{ Request::is('#appointment') ? 'active' : '' }}">Tambah Data Anak</a></li>
                    @auth
                    <li><a href="{{ route('anak.index') }}" class="{{ Request::is('anak') ? 'active' : '' }}">Periksa Anak</a></li>
                        <li><a href="{{ route('profile') }}" class="{{ Request::routeIs('profile') ? 'active' : '' }}">Profile</a></li>
                    @endauth
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            @guest
                <a class="cta-btn d-none d-sm-block" href="{{ route('login') }}">Login</a>
            @else
                <a style="background-color: red" class="cta-btn d-none d-sm-block" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest
        </div>
    </div>

</header>
