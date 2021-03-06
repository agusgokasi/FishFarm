<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" sizes="114x114" href="{{URL::asset('image/favicon.png')}}">



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
          @if (Route::has('login'))
          @auth
          @if (auth()->user()->isAdmin())
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <strong>{{ __('Saldo Anda : Rp') }}{{ format_uang(Auth::user()->balance) }}</strong>
            </a> -->
          </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">
                <strong>Pemberitahuan</strong>
              </a>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">
                <strong>{{ Auth::user()->username }}</strong>
              </a>
            </li>
            <!-- Dropdown -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
              <div class="dropdown-menu dropdown-primary dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('home') }}" >{{ __('profile') }}</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Keluar') }} </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('topups.create') }}">
                <strong>{{ __('Saldo Anda : Rp') }}{{ format_uang(Auth::user()->balance) }}</strong>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">
                <strong>Pemberitahuan</strong>
              </a>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">
                <strong>{{ Auth::user()->username }}</strong>
              </a>
            </li>
            <!-- Dropdown -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
              <div class="dropdown-menu dropdown-primary dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('home') }}">{{ __('profile') }}</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Keluar') }} </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </li>
          @endif
          @else
            <li class="nav-item">
              <a class="nav-link h5" href="{{ route('login') }}">
                <strong>Masuk</strong>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link h5" href="{{ route('register') }}">
                <strong>Daftar</strong>
              </a>
            </li>
          @endauth
          @endif
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
