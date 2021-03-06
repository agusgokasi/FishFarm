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
    <!-- CSS Files -->
    <link href="{{ asset('paper-dashboard-2-html-v2.0.0/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('paper-dashboard-2-html-v2.0.0/assets/css/paper-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    {{-- <link href="{{ asset('paper-dashboard-2-html-v2.0.0/assets/demo/demo.css') }}" rel="stylesheet" /> --}}
    {{-- toastr notification --}}
	<link rel="stylesheet" href="{{ asset('toastr-notify/toastr.css') }}">
</head>
{{-- <main class="py-4">
        @yield('content')
    </main> --}}

<body>

  {{-- navbar --}}
  <nav class="navbar navbar-expand-lg container">
    <div class="container-fluid">
      <a class="navbar-brand text-dark" href="/">FishFarm</a>
      <div class="navbar-wrapper">
        {{-- <div class="navbar-toggle">
          <button type="button" class="navbar-toggler">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </button>
        </div> --}}
        <!-- <a class="navbar-brand" href="#">Dashboard</a> -->
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
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link btn-magnify text-dark" href="{{ route('login') }}">
              <p>
                <span style="text-transform:none;">Login</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link btn-magnify text-dark" href="{{ route('register') }}">
              <p>
                <span style="text-transform:none;">Register</span>
              </p>
            </a>
          </li>
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
  <footer class="footer footer-black  footer-white">
    <div class="container-fluid">
      <div class="row d-flex justify-content-center">
        <div class="credits">
          <span class="copyright">
            ©&nbsp;
            <script>
              document.write(new Date().getFullYear())
            </script>, This copyright
          </span>
        </div>
      </div>
    </div>
  </footer>
  {{--! footer --}}

  
    {{--! main content  --}}
  </div>
    
    <!--   Core JS Files   -->
    <script src="{{ asset('paper-dashboard-2-html-v2.0.0/assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('paper-dashboard-2-html-v2.0.0/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('paper-dashboard-2-html-v2.0.0/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('paper-dashboard-2-html-v2.0.0/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Google Maps Plugin    -->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
    <!-- Chart JS -->
    <script src="{{ asset('paper-dashboard-2-html-v2.0.0/assets/js/plugins/chartjs.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('paper-dashboard-2-html-v2.0.0/assets/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    {{-- <script src="{{ asset('paper-dashboard-2-html-v2.0.0/assets/js/paper-dashboard.min.js?v=2.0.0') }}" type="text/javascript"></script> --}}
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    {{-- <script src="{{ asset('paper-dashboard-2-html-v2.0.0/assets/demo/demo.js') }}"></script> --}}
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

</body>
</html>
