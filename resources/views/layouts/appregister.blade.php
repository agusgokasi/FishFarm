<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" sizes="114x114" href="{{URL::asset('image/favicon.png')}}">


    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link href='https://fonts.googleapis.com/css?family=Arapey' rel='stylesheet'>

    <!-- Styles -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Material Design for Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <style type="text/css" media="screen">
        body, html {
          height: 100%;
        }
        .bg-image {
          background-image: url("{{ asset('image/tambakauth.jpg') }}");
          height: 100%; 
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          /* Add the blur effect */
          /*filter: blur(1.5px);
          -webkit-filter: blur(1.5px);*/
        }
        .bg-image2 {
          background-image: url("{{ asset('image/tambakauth.jpg') }}");
          height: 40%; 
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          /* Add the blur effect */
          /*filter: blur(1.5px);
          -webkit-filter: blur(1.5px);*/
        }

        /* Position text in the middle of the page/image */
        .container_border {
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0, 0.6); /* Black w/opacity/see-through */
          color: white;
          font-weight: bold;
          border: 1px solid #f1f1f1;
          position: absolute;
          left: 50%;
          top: 90%;
          transform: translate(-50%, -50%);
          z-index: 2;
          width: 80%;
          padding: 20px;
          text-align: center;
          border-radius: 25px;
        }
        .bg-image1 {
          background-image: url("{{ asset('image/tambakauth.jpg') }}");
          height: 40%; 
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          /* Add the blur effect */
          /*filter: blur(1.5px);
          -webkit-filter: blur(1.5px);*/
        }
        .invalid-feedback{
          text-align: left;
        }
        @media screen and (max-height: 600px){
        .g-recaptcha{
            transform:scale(0.66);-webkit-transform:scale(0.66);transform-origin:0 0;-webkit-transform-origin:50% 0;
          }
        }
    </style>
</head>
<body>
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
    <div class="bg-image"></div>
    <div class="bg-image1"></div>
    <div class="bg-image2"></div>
    {{-- @include('layouts.navbarauth') --}}
    <main>
        @yield('content')
    </main>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
    @yield('addjs')

</body>
</html>
