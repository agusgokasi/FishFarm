<!-- Navbar -->
  <nav class="navbar blue darken-3 fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">
      
      <!-- Brand -->
      <a class="navbar-brand" href="/">
        <strong>FishFarm</strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
        </ul>

        <!-- Right -->
        <ul class="navbar-nav ml-auto">

          @if (Route::has('login'))

          @auth

          @if (auth()->user()->isAdmin())
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <strong>{{ __('Saldo Anda : Rp') }}{{ format_uang(Auth::user()->balance) }}</strong>
            </a>
          </li> -->
           {{--  <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">
                <strong>Pemberitahuan</strong>
              </a>
            </li>--}}
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
  <!-- Navbar -->
  