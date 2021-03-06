  <!-- data-ride="carousel" -->
  <!--Carousel Wrapper-->
  <div id="carousel-example-1z" class="carousel slide carousel-fade">

    <!--Indicators-->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-1z" data-slide-to="1"></li>
      <li data-target="#carousel-example-1z" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

      <!--First slide-->
      <div class="carousel-item active">
        <div class="view" style="background-image: url({{ asset('image/tambak.jpg') }}); background-repeat: no-repeat; background-size: cover; height: 100%; background-position: center; background-attachment: fixed;">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-blue-grey-light d-flex justify-content-center align-items-center">

            <!-- Content -->
            <div class="container">
              <div class="row d-flex justify-content-center">
                <div class="text-center white-text mx-5 wow fadeIn">
                  <br>
                  <strong class="h1">FishFarm</strong>
                  <p>
                    <strong class="h3">(Under Construction)</strong>
                    <hr class="border" style="color: white; background-color: white; padding: 0.5px 0 0.5px 0">
                  </p>
                </div>
              </div>
              <div class="row white-text wow fadeIn text-center align-items-center">
                <div class="col border">
                  <strong class="h3-responsive">{{reduce_money($statistics[0]->nominal)}}</strong>
                  <p class="h6-responsive">Dana tersalurkan</p>
                </div>

                <div class="col border">
                  <strong class="h3-responsive">{{$statistics[1]->nominal}}</strong>
                  <p class="h6-responsive">Project berjalan</p>
                </div>
                <div class="col border">
                  <strong class="h3-responsive">{{reduce_money($statistics[2]->nominal)}}</strong>
                  <p class="h6-responsive">Profit dibagikan</p>
                </div>

                

              </div>
              <div class="row white-text wow fadeIn text-center align-items-center">
                  <div class="col border">
                  <strong class="h3-responsive">{{$statistics[3]->nominal}} %</strong>
                  <p class="h6-responsive">Tingkat kesuksesan</p>
                </div>
              </div>
            </div>
            
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/First slide-->

      <!--Second slide-->
      <div class="carousel-item">
        <div class="view" style="background-image: url({{ asset('image/tambak.jpg') }}); background-repeat: no-repeat; background-size: cover; height: 100%; background-position: center; background-attachment: fixed;">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-blue-grey-light d-flex justify-content-center align-items-center">

            <!-- Content -->
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="text-center white-text mx-5 wow fadeIn">
                        <br>
                        <strong class="h1">FishFarm</strong>
        
                      <p>
                        <strong class="h3">(Under Construction)</strong>
                        <hr class="border" style="color: white; background-color: white; padding: 0.5px 0 0.5px 0">
                      </p>
                      
                    </div>
                </div>
                    <div class="row white-text wow fadeIn text-center align-items-center">
                      <div class="col border">
                        <strong class="h3-responsive">{{reduce_money($statistics[0]->nominal)}}</strong>
                        <p class="h6-responsive">Dana tersalurkan</p>
                      </div>
                    
                      <div class="col border">
                        <strong class="h3-responsive">{{$statistics[1]->nominal}}</strong>
                        <p class="h6-responsive">Project berjalan</p>
                      </div>
                      <div class="col border">
                        <strong class="h3-responsive">{{reduce_money($statistics[2]->nominal)}}</strong>
                        <p class="h6-responsive">Profit dibagikan</p>
                      </div>
                    </div>
                    <div class="row white-text wow fadeIn text-center align-items-center">
                        <div class="col border">
                        <strong class="h3-responsive">{{$statistics[3]->nominal}} %</strong>
                        <p class="h6-responsive">Tingkat kesuksesan</p>
                      </div>
                    </div>
            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/Second slide-->

      <!--Third slide-->
      <div class="carousel-item">
        <div class="view" style="background-image: url({{ asset('image/tambak.jpg') }}); background-repeat: no-repeat; background-size: cover; height: 100%; background-position: center; background-attachment: fixed;">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-blue-grey-light d-flex justify-content-center align-items-center">

            <!-- Content -->
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="text-center white-text mx-5 wow fadeIn">
                          <br>
                            <strong class="h1">FishFarm</strong>
                          <p>
                            <strong class="h3">(Under Construction)</strong>
                            <hr class="border" style="color: white; background-color: white; padding: 0.5px 0 0.5px 0">
                          </p>
                    </div>
                </div>
                    <div class="row white-text wow fadeIn text-center align-items-center">
                      <div class="col border">
                        <strong class="h3-responsive">{{reduce_money($statistics[0]->nominal)}}</strong>
                        <p class="h6-responsive">Dana tersalurkan</p>
                      </div>
                    
                      <div class="col border">
                        <strong class="h3-responsive">{{$statistics[1]->nominal}}</strong>
                        <p class="h6-responsive">Project berjalan</p>
                      </div>
                      <div class="col border">
                        <strong class="h3-responsive">{{reduce_money($statistics[2]->nominal)}}</strong>
                        <p class="h6-responsive">Profit dibagikan</p>
                      </div>
                    </div>
                    <div class="row white-text wow fadeIn text-center align-items-center">
                        <div class="col border">
                        <strong class="h3-responsive">{{$statistics[3]->nominal}} %</strong>
                        <p class="h6-responsive">Tingkat kesuksesan</p>
                      </div>
                    </div>
            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/Third slide-->

    </div>
    <!--/.Slides-->

    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->

  </div>
  <!--/.Carousel Wrapper-->