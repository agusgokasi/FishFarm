<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      {{-- this app for dashboard --}}
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
      <link rel="icon" type="image/png" href="../assets/img/favicon.png">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <link rel="icon" type="image/png" sizes="114x114" href="{{URL::asset('image/favicon.png')}}">

 
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
      <!--     Fonts and icons     -->
      <link rel="dns-prefetch" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
      <link href='https://fonts.googleapis.com/css?family=Arapey' rel='stylesheet'>
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <!-- CSS Files -->
      <!-- CSS Files -->
      <link href="{{ asset('paper-dashboard-2-html-v2.0.0/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
      <link href="{{ asset('paper-dashboard-2-html-v2.0.0/assets/css/paper-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
      <link href="{{ asset('paper-dashboard-2-html-v2.0.0/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
      {{-- toastr notification --}}
	  <link rel="stylesheet" href="{{ asset('toastr-notify/toastr.css') }}">
      @yield('add_css')
   </head>
   {{-- 
   <main class="py-4">
      @yield('content')
   </main>
   --}}
   <body class="">
      <div class="wrapper">
         {{-- sidebar --}}
         <div class="sidebar" data-color="white" data-active-color="danger">
            <!--Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"-->
            <div class="logo">
               <a href="/" class="simple-text logo-mini">
                  <div class="logo-image-small">
                     <!-- <img src="../assets/img/logo-small.png"> -->
                  </div>
               </a>
               <a href="/" class="simple-text logo-normal"  style="text-transform: none; font-size: 20px">
                  FishFarm
                  <!-- <div class="logo-image-big">
                     <img src="../assets/img/logo-big.png">
                     </div> -->
               </a>
            </div>
            <!-- tawk.to -->
              <script type="text/javascript">
                var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
                (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/5bfa351340105007f379774d/default';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
                })();
              </script>
            <div class="sidebar-wrapper">
               @if (auth()->user()->isAdmin())
               <ul class="nav">
                  <li class="{{ Request::is('home') ? 'active' : '' }}">
                     <!-- <a href="./dashboard.html"> -->
                     <a href="/home">
                        <i class="fas fa-home"></i>
                        <p>Profile</p>
                     </a>
                  </li>
                  <li class="{{ Request::is('projects/create') ? 'active' : '' }}">
                     <!-- <a href="./icons.html"> -->
                     <a href="{{ url('/projects/create') }}">
                        <i class="fas fa-plus"></i>
                        <p>Buat Project Baru</p>
                     </a>
                  </li>
                  <li class="{{ Request::is('projects') ? 'active' : '' }}">
                     <a href="/projects">
                        <i class="fas fa-fish"></i>
                        <p>Project yang Tersedia</p>
                     </a>
                  </li>
                  <li class="{{ Request::is('projects/terdanai') ? 'active' : '' }}">
                     <a href="/projects/terdanai">
                        <i class="fas fa-fish"></i>
                        <p>Project yang Terdanai</p>
                     </a>
                  </li>
                  <li class="{{ Request::is('projects/selesai') ? 'active' : '' }}">
                     <a href="/projects/selesai">
                        <i class="fas fa-fish"></i>
                        <p>Project yang Selesai</p>
                     </a>
                  </li>
                  <li class="{{ Request::is('users') ? 'active' : '' }}">
                     <a href="{{ url('/users') }}">
                        <i class="fas fa-users"></i>
                        <p>Lihat List User</p>
                     </a>
                  </li>
                  <li class="{{ Request::is('topups') ? 'active' : '' }}">
                     <a href="{{ url('/topups') }}">
                        <i class="fas fa-money-check-alt"></i>
                        <p>Approve Topup</p>
                     </a>
                  </li>
                  <li class="{{ Request::is('withdraws') ? 'active' : '' }}">
                     <a href="{{ url('/withdraws') }}">
                        <i class="far fa-check-square"></i>
                        <p>Approve Withdraw</p>
                     </a>
                  </li>
                  <li class="{{ Request::is('transaksi/transaksi') ? 'active' : '' }}">
                     <a href="/transaksi/transaksi">
                        <!-- <i class="nc-icon nc-paper"></i> -->
                        <i class="fas fa-history"></i>
                        <p>Lihat Semua Transaksi</p>
                     </a>
                  </li>
                  <!--
                  <li class="{{ Request::is('message') ? 'active' : '' }}">
                     <a href="{{ url('/message') }}">
                        <i class="far fa-comments"></i>
                        <p>Kontak User</p>
                     </a>
                  </li>
                  -->
               </ul>
               @else
               <ul class="nav">
                  <li class="{{ Request::is('home') ? 'active' : '' }}">
                     <!-- <a href="./dashboard.html"> -->
                     <a href="/home">
                        <i class="fas fa-home"></i>
                        <p>profile</p>
                     </a>
                  </li>
                  <li class="{{ Request::is('topups/create') ? 'active' : '' }}">
                     <!-- <a href="./icons.html"> -->
                     <a href="/topups/create">
                        
                        <i class="nc-icon nc-money-coins"></i>
                        <p>Isi Saldo</p>
                     </a>
                  </li>
                  <li class="{{ Request::is('projects') ? 'active' : '' }}">
                     <a href="/projects">
                        <i class="fas fa-fish"></i>
                        <p>Project yang Tersedia</p>
                     </a>
                  </li>
                  <li class="{{ Request::is('projects/terdanai') ? 'active' : '' }}">
                     <a href="/projects/terdanai">
                        <i class="fas fa-fish"></i>
                        <p>Project yang Terdanai</p>
                     </a>
                  </li>
                  <li class="{{ Request::is('projects/selesai') ? 'active' : '' }}">
                     <a href="/projects/selesai">
                        <i class="fas fa-fish"></i>
                        <p>Project yang Selesai</p>
                     </a>
                  </li>
                  <!--@if (auth()->user()->saldo==0)
                  <li class="{{ Request::is('#') }}">
                     <a href="#">
                        <i class="fas fa-hand-holding-usd"></i>
                        <p>Withdraw</p>
                     </a>
                  </li>
                  @else
                  @endif-->
                  <li class="{{ Request::is('withdraws/create') ? 'active' : '' }}">
                     <a href="/withdraws/create">
                        <i class="fas fa-hand-holding-usd"></i>
                        <p>Withdraw</p>
                     </a>
                  </li>
                  
                  <li class="{{ Request::is('transaksi') ? 'active' : '' }}">
                     <a href="/transaksi">
                        <!-- <i class="nc-icon nc-paper"></i> -->
                        <i class="fas fa-history"></i>
                        <p>History Transaksi</p>
                     </a>
                  </li>
                  <!--
                  <li class="{{ Request::is('message') ? 'active' : '' }}">
                     <a href="{{ url('/message') }}">
                        <i class="far fa-comments"></i>
                        <p>Kontak Admin</p>
                     </a>
                  </li>
                  -->
               </ul>
               @endif       
            </div>
         </div>
         {{--! sidebar  --}}
         {{-- main panel--}}
         <div class="main-panel">
            {{-- navbar --}}
            <nav class="navbar navbar-expand-lg navbar-absolute navbar-fixed-top navbar-transparent">
               <div class="container-fluid">
                  <div class="navbar-wrapper">
                     <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                        </button>
                     </div>
                     <!-- <a class="navbar-brand" href="#">Dashboard</a> -->
                     @yield('navbar_brand')
                  </div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-bar navbar-kebab"></span>
                  <span class="navbar-toggler-bar navbar-kebab"></span>
                  <span class="navbar-toggler-bar navbar-kebab"></span>
                  </button>
                  <div class="collapse navbar-collapse justify-content-end" id="navigation">
                     <ul class="navbar-nav">
                        @if (Route::has('login'))
                        @auth
                        @if (auth()->user()->isAdmin())
                        <li class="nav-item">
                           <a class="nav-link btn-magnify" href="{{ route('home') }}">
                              <i class="nc-icon nc-circle-10"></i>
                              <p>
                                 <span style="text-transform:none;">{{ Auth::user()->username }}</span>
                              </p>
                           </a>
                        </li>
                        <li class="nav-item btn-rotate dropdown" title="Lainnya">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="nc-icon nc-settings-gear-65"></i>
                              <p>
                                 <span class="d-lg-none d-md-block" style="text-transform:none;">Lainnya</span>
                              </p>
                           </a>
                           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="{{ route('home') }}">Profile</a>
                              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                              </form>
                           </div>
                        </li>
                        @else
                        <li class="nav-item">
                           <a class="nav-link btn-magnify" href="/topups/create" title="Saldo Anda">
                              <i class="fas fa-coins" style="margin-left: 5px"></i>
                              <p>
                                 <span> &nbsp;Rp. {{ format_uang(Auth::user()->balance) }}</span>
                              </p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link btn-magnify" href="{{ route('home') }}">
                              <i class="nc-icon nc-circle-10"></i>
                              <p>
                                 <span style="text-transform:none;">{{ Auth::user()->username }}</span>
                              </p>
                           </a>
                        </li>
                        <li class="nav-item btn-rotate dropdown" title="Lainnya">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="nc-icon nc-settings-gear-65"></i>
                              <p>
                                 <span class="d-lg-none d-md-block" style="text-transform:none;">Lainnya</span>
                              </p>
                           </a>
                           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="{{ route('home') }}">Profile</a>
                              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                              </form>
                           </div>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                           <a class="nav-link btn-magnify" href="{{ route('login') }}">
                              <p>
                                 <span style="text-transform:none;">Login</span>
                              </p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link btn-magnify" href="{{ route('register') }}">
                              <p>
                                 <span style="text-transform:none;">Register</span>
                              </p>
                           </a>
                        </li>
                        @endauth
                        @endif
                     </ul>
                  </div>
               </div>
            </nav>
            {{--! navbar --}}
            {{-- content --}}
            <div class="content">
               @yield('content')
            </div>
            {{--! content --}}
            {{-- footer --}}
            <footer class="footer footer-black  footer-white ">
               <div class="container-fluid">
                  <div class="row">
                     <div class="credits ml-auto">
                        <span class="copyright">
                           ©
                           <script>
                              document.write(new Date().getFullYear())
                           </script>, This copyright
                        </span>
                     </div>
                  </div>
               </div>
            </footer>
            {{--! footer --}}
         </div>
         {{--! main content  --}}
      </div>
      <!--   Core JS Files   -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
      <script src="{{ asset('paper-dashboard-2-html-v2.0.0/assets/js/core/jquery.min.js') }}"></script>
      <script src="{{ asset('paper-dashboard-2-html-v2.0.0/assets/js/core/popper.min.js') }}"></script>
      <script src="{{ asset('paper-dashboard-2-html-v2.0.0/assets/js/core/bootstrap.min.js') }}"></script>
      <script src="{{ asset('paper-dashboard-2-html-v2.0.0/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
      @yield('add_js_phone')
      <!--  Google Maps Plugin    -->
      {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
      <!-- Chart JS -->
      <script src="{{ asset('paper-dashboard-2-html-v2.0.0/assets/js/plugins/chartjs.min.js') }}"></script>
      <!--  Notifications Plugin    -->
      <script src="{{ asset('paper-dashboard-2-html-v2.0.0/assets/js/plugins/bootstrap-notify.js') }}"></script>
      <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
      <script src="{{ asset('paper-dashboard-2-html-v2.0.0/assets/js/paper-dashboard.min.js?v=2.0.0') }}" type="text/javascript"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      
    <script>
    	toastr.options = {
    	  "closeButton": true,
    	  "debug": false,
    	  "newestOnTop": true,
    	  "progressBar": true,
    	  "positionClass": "toast-bottom-left",
    	  "preventDuplicates": false,
    	  "onclick": null,
    	  "showDuration": "300",
    	  "hideDuration": "1000",
    	  "timeOut": "5000",
    	  "extendedTimeOut": "1000",
    	  "showEasing": "swing",
    	  "hideEasing": "linear",
    	  "showMethod": "slideDown",
    	  "hideMethod": "slideUp",
    	}
    	intervalIdentifier = setTimeout(hello, 2200)
    	function hello() {
    	    @if ($newinvestasion->isEmpty())
    	      toastr.info(
    	        'Mari Berinvestasi'
    	      );
    	    @else
    	      toastr.info(
    	        'Investasi Terbaru <hr class="border"> {{$newinvestasion[0]->username}} : Rp. {{format_uang($newinvestasion[0]->nominal)}}'
    	      );
    	    @endif
    	}
    </script>
      @yield('add_js')
   </body>
</html>