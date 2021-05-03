<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aston Animal Sanctuary') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                {{-- Logo on navbar --}}
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="20.000000pt" height="20.000000pt"
                    viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet" style="margin-right: 7px">

                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000"
                        stroke="none">
                        <path d="M1265 4793 c-381 -35 -740 -235 -970 -542 -206 -273 -304 -603 -292
       -982 9 -296 65 -506 218 -804 332 -651 1046 -1320 2187 -2050 l152 -97 168
       107 c1254 807 1982 1528 2266 2245 88 223 126 420 126 652 -1 596 -292 1090
       -789 1338 -180 89 -345 128 -596 137 -465 17 -785 -91 -1112 -375 l-63 -54
       -62 54 c-258 223 -503 333 -820 368 -91 9 -322 11 -413 3z m975 -1156 c62 -29
       142 -113 179 -189 130 -264 26 -567 -194 -568 -194 0 -374 275 -337 515 17
       110 56 185 120 229 69 47 146 52 232 13z m910 5 c42 -16 106 -95 130 -158 40
       -107 25 -276 -34 -393 -37 -72 -119 -156 -181 -186 -265 -125 -455 228 -295
       546 88 172 238 249 380 191z m-1484 -658 c143 -68 262 -282 239 -431 -19 -128
       -94 -198 -210 -197 -79 0 -142 31 -215 104 -265 265 -120 671 186 524z m2068
       9 c124 -64 149 -239 59 -417 -137 -271 -452 -299 -505 -44 -55 265 238 567
       446 461z m-1041 -289 c274 -71 564 -356 673 -659 62 -175 72 -383 23 -481 -50
       -100 -114 -109 -319 -49 -270 80 -300 86 -436 92 -153 6 -205 -2 -466 -77
       -175 -51 -265 -63 -305 -41 -66 35 -93 112 -93 266 0 196 67 385 198 560 136
       183 331 331 502 382 90 26 142 28 223 7z" />
                    </g>
                </svg>
                <a class="navbar-brand" style="margin-right: 40px" href="{{ url('/') }}">
                    {{ config('app.name', 'Aston Animal Sanctuary') }}

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('list') }}">List Animals </a>
                            </li>

                            @if (Gate::denies('publicview') == false)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('list/create') }}">Create New </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('requests') }}">Pending Requests </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('all_adoptions') }}">Previous Requests </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('adopter') }}">Adopted Animals </a>
                                </li>
                            @endif
                            @if (Gate::denies('publicview') == true)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('requests_history') }}">My Requests </a>
                                </li>
                            @endif
                        @endguest

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
