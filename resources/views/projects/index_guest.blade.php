@extends('layouts.app_guest')

@section('content')
<div class="container">

    @if (session('msg'))
      <div class="alert alert-succes">
        <p> {{ session('msg')}}</p>
      </div>
    @endif

    <div class="row d-flex justify-content-center">
      @foreach ($projects as $project)
      <div class="col md-4 d-flex justify-content-center">
        <div class="card border" style="width: 18rem;">
          <div class="view view-cascade overlay card-header d-flex justify-content-center">
            <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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
            </div>-->
            <img src="{{asset('project_image/' . $project->project_image)}}" class="card-img-top" alt="" style="width: 250px; height: 200px">
            <a>
                <div class="mask rgba-white-slight"></div>
            </a>
        </div>
          <div class="card-body text-center">
            <h5 class="card-title">{{ $project->title }}</h5>
            <a href="/projects/{{ $project->slug }}" class="btn btn-primary">Lihat Project</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="row d-flex justify-content-center">
    <div class="pagination-bar text-center" style="margin-top: 50px">
      {{ $projects->onEachSide(1)->links() }}
      </div>
    </div>
</div>
@endsection
