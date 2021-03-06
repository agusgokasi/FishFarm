<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FishFarm</title>
    <link rel="icon" type="image/png"  size="32x32" href="{{URL::asset('image/favicon.png')}}">
    {{--<link rel="icon" href="asset('image/favicon.png')}}">--}}

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('MDB-Free_4.5.12/css/bootstrap.min.css') }}" rel="stylesheet" >
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('MDB-Free_4.5.12/css/mdb.min.css') }}" rel="stylesheet">
    {{-- another css --}}
    <link href="{{ asset('MDB-Free_4.5.12/css/style.css') }}" rel="stylesheet">
    <style type="text/css">
      /* Required height of parents of the Full Page Carousel for proper displaying carousel itself */
      html, body, .view {height: 100%; }
      /* Carousel*/
      .carousel, .carousel-item, .carousel-item.active { height: 100%;}
      /* Full Page Carousel itself*/
      .carousel {height: 100%; }
      .carousel .carousel-inner {height: 100%; }
      .carousel .carousel-inner .carousel-item, .carousel .carousel-inner .active {height: 100%; }      
      .carousel-inner {height: 100%;}
      /* Navbar animation */
      .navbar {background-color: rgba(0, 0, 0, 0.75); }
      .top-nav-collapse {background-color: #1C2331; }
      /* Adding color to the Navbar on mobile */
      @media only screen and (max-width: 768px) {
        .navbar { background-color: #1C2331; } 
      }
      /* Footer color for sake of consistency with Navbar */
      .page-footer { background-color: #1C2331; }
      @media (min-width: 800px) and (max-width: 850px) {
        .navbar:not(.top-nav-collapse) {background: #1C2331!important;}
      }
      
  </style>
  
  <style>
  
  .fa {
  padding: 20px;
  font-size: 30px;
  width: 30px;
  text-align: center;
  text-decoration: none;
  border-radius: 50%;
}

  </style>
  
  {{-- toastr notification --}}
  <link rel="stylesheet" href="{{ asset('toastr-notify/toastr.css') }}">
</head>

<body>
  @include('layouts.navbar')
  @include('layouts.carousel')
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
  <!--Main layout-->
  <main>
    <div class="container">

      <!--Section: Mengapa Crowdfund-->
      <section class="mt-5 wow fadeIn">

        <!--Grid row-->
        <div class="row">

          <!--Grid column-->
          <div class="col-md-6 mb-4">

            {{--<img src="{{ asset('image/tambak.jpg') }}" class="img-fluid z-depth-1-half" alt="">--}}
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/IBpabdoJztw" allowfullscreen></iframe>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 mb-4">

            <!-- Main heading -->
            <h3 class="h3 mb-3">Mengapa FishFarm?</h3>
            <p align= "justify">
              FishFarm memudahkan Anda dalam berinvestasi di sektor perikanan Indonesia. 
            </p>
            <!-- Main heading -->

            <hr>

            <p align= "justify">
                Fish Farm hadir untuk menjadi solusi bersama antara Anda yang ingin menanamkan investasi dan petan ikan yang membutuhkan modal untuk mengembangkan usahanya . Dengan berinvestasi di Fish Farm sama halnya dengan berinvestasi untuk masa depan Anda dengan pembagian keuntungan yang menjanjikan. Berinvestasi di Fish Farm juga sebagai bentuk dukungan Anda untuk membantu mensejahterakan perekonomian petani ikan. Jangan ragu untuk berinvestasi di Fish Farm! 
            </p>

            <!-- CTA -->
            <a target="_blank" class="btn btn-blue btn-md">
              Tentang Kami
              {{-- <i class="fa fa-download ml-1"></i> --}}
            </a>
            <a target="_blank" class="btn btn-blue btn-md">
              Kontak
            </a>

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->
      </section>
      <!--Section: Mengapa Crowdfund -->

      <hr class="my-5">

      <!--Section: Bagaimana Crowdfund Bekerja-->
      <section>

        <h3 class="h3 text-center mb-5">Bagaimana FishFarm Bekerja?</h3>

        <!--Grid row-->
        <div class="container">
            <div class="row wow fadeIn text-center">
                <p>Fishfarm bekerja dengan kepercayaan sebagai dasar, disini kami bekerja sepenuh hati untuk memberikan yang terbaik bagi investor kami, berikut adalah cara kerja dari Fishfarm </p>
            </div>
            <div class="row wow fadeIn d-flex justify-content-center">
              <img src="{{ asset('image/cara-kerja2.png') }}" class="img-fluid" alt="Cara Bekerja" style="width: 800px; height: 500px"> 

            </div>
         
            
            <hr class="my-5">
          
            <br>
            <div class="row wow fadeIn d-flex justify-content-center">
              <img src="{{ asset('image/cara-investasi2.jpg') }}" class="img-fluid" alt="Cara Bekerja" style="width: 800px; height: 500px" >
            
            </div>
            
             <hr class="my-5">
            
            <br>
            <div class="row wow fadeIn d-flex justify-content-center">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/sk5q2pBbibg"  allowfullscreen></iframe> 
            </div>
                  
        </div>
        <!--/Grid row-->
      </section>
      <!--Section: Bagaimana Crowdfund Bekerja -->

      <hr class="my-5">

      <!--Section: Project Pilihan-->
      <section>

        <h2 class="my-5 h3 text-center">Project Pilihan</h2>
        <h2 class="my-5 h3">A. PROJECT TERBARU</h2>
        {{-- card --}}
              <div class="row">
                @foreach ($projects as $project)
                <div class="col-lg-4 col-md-6 mb-4">
                
                  <!--Card-->
                  
                    <div class="card card-cascade narrower mb-4" style="margin-top: 28px;">

                        <!--Card image-->
                        <div class="view view-cascade overlay card-header d-flex justify-content-center">
                            <!--- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                              </ol>
                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <img class="d-block w-100" src="{{asset('project_image/' . $project->project_image)}}" alt="First slide" style="width: 250px; height: 200px">
                                </div>
                                @if ($project->project_image1==null)
                                <div class="carousel-item">
                                  <img class="d-block w-100" src="{{asset('project_image/' . $project->project_image)}}" alt="First slide" style="width: 250px; height: 200px">
                                </div>
                                @else
                                <div class="carousel-item">
                                  <img class="d-block w-100" src="{{asset('project_image1/' . $project->project_image1)}}" alt="Second slide" style="width: 250px; height: 200px">
                                </div>
                                @endif
                                @if ($project->project_image2==null)
                                <div class="carousel-item">
                                  <img class="d-block w-100" src="{{asset('project_image/' . $project->project_image)}}" alt="First slide" style="width: 250px; height: 200px">
                                </div>
                                @else
                                <div class="carousel-item">
                                  <img class="d-block w-100" src="{{asset('project_image2/' . $project->project_image2)}}" alt="Third slide" style="width: 250px; height: 200px">
                                </div>
                                @endif
                              </div>
                              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div> --->
                             <img src="{{asset('project_image/' . $project->project_image)}}" class="card-img-top" alt="" style="width: 325px; height: 200px"> 
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!--/.Card image-->
                        <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                            <h5 class="pink-text"></i>{{$project->title}}</h5>
                            <!--Title-->
                            <h6 class="card-title">Rp.{{$project->project_price}}</h6>
                            <h6 class="card-title">Total Slot : {{$project->slot}}</h6>
                            <h6 class="card-title">@if ($project->progress == $project->project_price)
                                                    <!-- <i class="fas fa-spinner"></i> --> Progress : Terdanai Penuh
                                                  @else
                                                    <!-- <i class="fas fa-spinner"></i> --> Progress : Rp.{{format_uang($project->progress)}} / Rp.{{format_uang($project->project_price)}}
                                                  @endif</h6>
                            {{-- laporan keuangan --}}
                            @if (Route::has('login'))
                            @auth
                            @if ($project->money_report==null)
                            <div class="tab-pane" id="report" role="tabpanel">
                            
                              <p>{{-- <i class="fas fa-book"></i> --}}Tidak Ada Laporan Keuangan</p>
                            </div>
                            @else
                            <div class="tab-pane" id="report" role="tabpanel">
                            
                              {{-- <i class="fas fa-book"></i> --}}<a href="/moneyreport/{{$project->money_report}}" download="{{$project->money_report}}">Download Laporan Keuangan</a>
                            </div>
                            @endif
                            @endauth                            
                            @endif
                            <!--Text-->
                            <p class="card-text">{{$project->description}}</p>
                            @if (Route::has('login'))
                            @auth
                            @if (auth()->user()->isAdmin())
                              <a href="/projects/{{ $project->slug }}" class="btn btn-unique">Lihat</a>
                            @else
                              <a href="/projects/{{ $project->slug }}" class="btn btn-unique">Lihat</a>
                            @endif  
                            @else
                              <a href="/project/{{ $project->slug }}" class="btn btn-unique">Lihat</a>
                            @endauth                            
                            @endif
                            
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                
                </div>
                @endforeach
                </div>
        
        <h2 class="my-5 h3">B. PROJECT BERJALAN</h2>
        {{-- card --}}
              <div class="row">
                @foreach ($projects1 as $project)
                <div class="col-lg-4 col-md-6 mb-4">
                
                  <!--Card-->
                  
                    <div class="card card-cascade narrower mb-4" style="margin-top: 28px;">

                        <!--Card image-->
                        <div class="view view-cascade overlay card-header d-flex justify-content-center">
                            <!--- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                              </ol>
                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <img class="d-block w-100" src="{{asset('project_image/' . $project->project_image)}}" alt="First slide" style="width: 250px; height: 200px">
                                </div>
                                @if ($project->project_image1==null)
                                <div class="carousel-item">
                                  <img class="d-block w-100" src="{{asset('project_image/' . $project->project_image)}}" alt="First slide" style="width: 250px; height: 200px">
                                </div>
                                @else
                                <div class="carousel-item">
                                  <img class="d-block w-100" src="{{asset('project_image1/' . $project->project_image1)}}" alt="Second slide" style="width: 250px; height: 200px">
                                </div>
                                @endif
                                @if ($project->project_image2==null)
                                <div class="carousel-item">
                                  <img class="d-block w-100" src="{{asset('project_image/' . $project->project_image)}}" alt="First slide" style="width: 250px; height: 200px">
                                </div>
                                @else
                                <div class="carousel-item">
                                  <img class="d-block w-100" src="{{asset('project_image2/' . $project->project_image2)}}" alt="Third slide" style="width: 250px; height: 200px">
                                </div>
                                @endif
                              </div>
                              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div> --->
                             <img src="{{asset('project_image/' . $project->project_image)}}" class="card-img-top" alt="" style="width: 325px; height: 200px"> 
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!--/.Card image-->
                        <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                            <h5 class="pink-text"></i>{{$project->title}}</h5>
                            <!--Title-->
                            <h6 class="card-title">Rp.{{$project->project_price}}</h6>
                            <h6 class="card-title">Total Slot : {{$project->slot}}</h6>
                            <h6 class="card-title">@if ($project->progress == $project->project_price)
                                                    <!-- <i class="fas fa-spinner"></i> --> Progress : Terdanai Penuh
                                                  @else
                                                    <!-- <i class="fas fa-spinner"></i> --> Progress : Rp.{{format_uang($project->progress)}} / Rp.{{format_uang($project->project_price)}}
                                                  @endif</h6>
                            {{-- laporan keuangan --}}
                            @if (Route::has('login'))
                            @auth
                            @if ($project->money_report==null)
                            <div class="tab-pane" id="report" role="tabpanel">
                            
                              <p>{{-- <i class="fas fa-book"></i> --}}Tidak Ada Laporan Keuangan</p>
                            </div>
                            @else
                            <div class="tab-pane" id="report" role="tabpanel">
                            
                              {{-- <i class="fas fa-book"></i> --}}<a href="/moneyreport/{{$project->money_report}}" download="{{$project->money_report}}">Download Laporan Keuangan</a>
                            </div>
                            @endif
                            @endauth                            
                            @endif
                            <!--Text-->
                            <p class="card-text">{{$project->description}}</p>
                            @if (Route::has('login'))
                            @auth
                            @if (auth()->user()->isAdmin())
                              <a href="/projects/{{ $project->slug }}" class="btn btn-unique">Lihat</a>
                            @else
                              <a href="/projects/{{ $project->slug }}" class="btn btn-unique">Lihat</a>
                            @endif  
                            @else
                              <a href="/project/{{ $project->slug }}" class="btn btn-unique">Lihat</a>
                            @endauth                            
                            @endif
                            
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                
                </div>
                @endforeach
                </div>
                
        <h2 class="my-5 h3">C. PROJECT SELESAI</h2>
        {{-- card --}}
              <div class="row">
                @foreach ($projects2 as $project)
                <div class="col-lg-4 col-md-6 mb-4">
                
                  <!--Card-->
                  
                    <div class="card card-cascade narrower mb-4" style="margin-top: 28px;">

                        <!--Card image-->
                        <div class="view view-cascade overlay card-header d-flex justify-content-center">
                            <!--- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                              </ol>
                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <img class="d-block w-100" src="{{asset('project_image/' . $project->project_image)}}" alt="First slide" style="width: 250px; height: 200px">
                                </div>
                                @if ($project->project_image1==null)
                                <div class="carousel-item">
                                  <img class="d-block w-100" src="{{asset('project_image/' . $project->project_image)}}" alt="First slide" style="width: 250px; height: 200px">
                                </div>
                                @else
                                <div class="carousel-item">
                                  <img class="d-block w-100" src="{{asset('project_image1/' . $project->project_image1)}}" alt="Second slide" style="width: 250px; height: 200px">
                                </div>
                                @endif
                                @if ($project->project_image2==null)
                                <div class="carousel-item">
                                  <img class="d-block w-100" src="{{asset('project_image/' . $project->project_image)}}" alt="First slide" style="width: 250px; height: 200px">
                                </div>
                                @else
                                <div class="carousel-item">
                                  <img class="d-block w-100" src="{{asset('project_image2/' . $project->project_image2)}}" alt="Third slide" style="width: 250px; height: 200px">
                                </div>
                                @endif
                              </div>
                              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div> --->
                             <img src="{{asset('project_image/' . $project->project_image)}}" class="card-img-top" alt="" style="width: 325px; height: 200px"> 
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!--/.Card image-->
                        <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                            <h5 class="pink-text"></i>{{$project->title}}</h5>
                            <!--Title-->
                            <h6 class="card-title">Rp.{{$project->project_price}}</h6>
                            <h6 class="card-title">Total Slot : {{$project->slot}}</h6>
                            <h6 class="card-title">@if ($project->progress == $project->project_price)
                                                    <!-- <i class="fas fa-spinner"></i> --> Progress : Terdanai Penuh
                                                  @else
                                                    <!-- <i class="fas fa-spinner"></i> --> Progress : Rp.{{format_uang($project->progress)}} / Rp.{{format_uang($project->project_price)}}
                                                  @endif</h6>
                            {{-- laporan keuangan --}}
                            @if (Route::has('login'))
                            @auth
                            @if ($project->money_report==null)
                            <div class="tab-pane" id="report" role="tabpanel">
                            
                              <p>{{-- <i class="fas fa-book"></i> --}}Tidak Ada Laporan Keuangan</p>
                            </div>
                            @else
                            <div class="tab-pane" id="report" role="tabpanel">
                            
                              {{-- <i class="fas fa-book"></i> --}}<a href="/moneyreport/{{$project->money_report}}" download="{{$project->money_report}}">Download Laporan Keuangan</a>
                            </div>
                            @endif
                            @endauth                            
                            @endif
                            <!--Text-->
                            <p class="card-text">{{$project->description}}</p>
                            @if (Route::has('login'))
                            @auth
                            @if (auth()->user()->isAdmin())
                              <a href="/projects/{{ $project->slug }}" class="btn btn-unique">Lihat</a>
                            @else
                              <a href="/projects/{{ $project->slug }}" class="btn btn-unique">Lihat</a>
                            @endif  
                            @else
                              <a href="/project/{{ $project->slug }}" class="btn btn-unique">Lihat</a>
                            @endauth                            
                            @endif
                            
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                
                </div>
                @endforeach
                </div>
                
                {{-- link ke project --}}
                @if (Route::has('login'))
                @auth
                @if (auth()->user()->isAdmin())
                <div class="container text-center">
                  <a href="/projects" class="btn btn-warning btn-rounded btn-lg" role="button">Lihat Project Lain&nbsp; >></a>
                </div>
                @else
                  <div class="container text-center">
                    <a href="/projects" class="btn btn-warning btn-rounded btn-lg" role="button">Lihat Project Lain&nbsp; >></a>
                  </div>
                @endif  
                @else
                  <div class="container text-center">
                    <a href="/project" class="btn btn-warning btn-rounded btn-lg" role="button">Lihat Project Lain&nbsp; >></a>
                  </div>
                @endauth                            
                @endif
        
      </section>
      <!--Section: Project Pilihan-->

      <hr class="mb-5">

      <!--Section: Deskripsi Perusahaan-->
      <section>
        <h2 class="my-5 h3 text-center">Deskripsi Perusahaan</h2>
        <p align= "justify">Fish Farm merupakan sebuah platform investasi di bidang perikanan yang memfasilitasi Anda sebagai Investor untuk berinvestasi sekaligus memiliki tambak anda sendiri. Dana yang Anda investasikan akan dikelola oleh fishfarm dalam bentuk budidaya perikanan menggunakan sistem akad terlebih dahulu. 
            Keuntungan dari hasil panen slot yang anda investasikan akan dibagikan kepada Anda dan kami sebagai platform dan pengelola investasi.
                Fish Farm telah memiliki sumber daya yang dijamin berkualitas untuk mengelola budidaya perikanan Anda. Kemudian FishFarm mengajak masyarakat Indonesia khususnya Anda, untuk melakukan pembiayaan sebagai instrumen investasi yang produktif di bidang perikanan budidaya.
                Kami memberikan pengalaman budidaya ikan secara virtual / online yang menguntungkan dan mudah kepada masyarakat Indonesia.
                Pada lokasi budidaya, Fish Farm melakukan pendampingan langsung secara berkala dalam bentuk monitoring, perencanaan keuangan, pengecekan pertumbuhan ikan, dan laporan komprehensif kepada Anda. Setelah ikan dipanen, maka FishFarm akan menjualnya melalui sarana online ataupun offline. Kemudian profit (keuntungan) akan dibagikan kepada investor dan kami.
                Dengan Anda berinvestasi di Fish Farm, maka Anda telah memilih berinvestasi dengan aman dan terpercaya.</p>
      </section>
      <!--Section: Deskripsi Perusahaan-->

    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-left font-small mt-4 wow fadeIn">
<div class="container">
  <div class="row">
    <div class="col-6">
    <br>Email / Telpon:
    <br>support@fishfarm.id/+62 896 0681 6316
    <br>
    <br>Kantor Pusat:
    <br>Jl. Boulevard Raya Blok QJ1 No. 20
    <br>Kelapa Gading, Jakarta Utara, DKI Jakarta
    <br>
    <br>Alamat Tambak:
    <br>Desa Blendung, Kec. Ulujami, Pemalang
    <br>
    <br>
    </div>
    <div class="col-6">
        
    <!--Call to action-->
    <div class="pt-4 text-center">
         <font size="6">
             <br>
              Our Social Media</font>
        <div>
      <a href="https://www.facebook.com/fishfarm.crowfund.7" target="_blank" class="fa fa-facebook"></a> 
      <a href=" https://twitter.com/fishfarm14" target="_blank" class="fa fa-twitter"></a>
      <a href="https://www.instagram.com/fishfarm.id/" target="_blank" class="fa fa-instagram"></a>
      <a href="https://www.youtube.com/channel/UCCnd7nn5yKCmJgkP82ALwlQ" target="_blank" class="fa fa-youtube"></a>
        </div>
    </div>
    
    <!--/.Call to action-->

    <hr class="my-4">
    </div>
  </div>
</div>

    <!--Copyright-->
    <div class="footer-copyright py-3">
        <div class="container">
  <div class="row">
    <div class="col-sm-6">© 2019 fishfarm.id - All Rights Reserved</div>
    <div class="col-sm-6 text-right">
    <a href="https://mdbootstrap.com/" target="_blank">Design by MDB</a></div>
  </div>
</div>
            
      {{-- © 2018 Copyright: --}}
      
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="{{ asset('MDB-Free_4.5.12/js/jquery.min.js') }}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ asset('MDB-Free_4.5.12/js/popper.min.js') }}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ asset('MDB-Free_4.5.12/js/bootstrap.min.js') }}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ asset('MDB-Free_4.5.12/js/mdb.min.js') }}"></script>
  <!-- tawk to -->
  <!-- Initializations -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script>
    new WOW().init();
  </script>
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
    intervalIdentifier = setTimeout(hello, 2100)
    function hello() {
        @if ($newinvestasion->isEmpty())
          toastr.info(
            'Mari Berinvestasi'
          );
        @else
          toastr.info(
            'Investasi Terbaru <hr class="border">\ {{$newinvestasion[0]->username}} : Rp. {{format_uang($newinvestasion[0]->nominal)}}'
          );
        @endif
    }
  </script>
  <div class="hiddendiv common"></div>

</body>

</html>
