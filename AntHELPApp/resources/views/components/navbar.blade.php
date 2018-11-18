<nav class="navbar navbar-expand-lg text-uppercase navbar-dark w-100 {{$classes}}">
    <a class="navbar-brand" href="/">
        <div class="anthelp-logo"></div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/"><b>Home</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/services"><b>Services</b></a>
            </li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-primary mr-md-2 mb-2 mb-md-0">LOGIN</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-auto btn btn-outline-light mr-3">SIGN UP</a>
                    @endif
                </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @if (Auth::guard("serviceprovider")->check())
                            <a class="dropdown-item" href="{{ route('serviceprovider.dashboard') }}">My Account</a>
                        @elseif (Auth::guard("web")->check())
                            <a class="dropdown-item" href="{{ action('HomeController@index') }}">My Account</a>
                        @endif
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
</nav>
