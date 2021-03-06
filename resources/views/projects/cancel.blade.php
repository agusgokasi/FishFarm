@extends('layouts.app')

@section('add_css')
@endsection

@section('content')
<div class="container">
  @if (session('msg'))
    <div class="alert alert-succes">
      <p> {{ session('msg')}}</p>
    </div>
  @endif
  <h1 class="text-center">Halaman Cancel Project</h1>
  <hr>
  <br>
  <div class="row">
    <div class="col-md-5 border" style="border-radius: 10px">
      <br><br>
      <div class="card border" style="width: 25rem;">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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
      </div>
      </div>
      <br>
      <h1>{{$project->title}}</h1>
      <p><i class="fas fa-calendar-alt"></i> Project dimulai : {{date('d-m-Y', strtotime($project->opened_at))}}</p>
      <p><i class="fas fa-calendar"></i> Project ditutup pada : {{date('d-m-Y', strtotime($project->closed_at))}}</p>
      <p><i class="fas fa-money-bill-alt"></i> Dana yang dibutuhkan : Rp.{{format_uang($project->project_price)}}</p>
      <p><i class="fas fa-list-ul"></i> Slot yang tersedia : {{$project->slot}}</p>
      <p><i class="fas fa-coins"></i> Jumlah uang per slot : Rp.{{format_uang($project->slot_price)}}</p>
      <!-- <p>dibuat oleh : {project-user-name}</p> -->

      <p><a href="/projects/{{ $project->slug }}" class="btn btn-default">Kembali Ke Halaman Sebelumnya</a></p>  
      <p><a href="/projects" class="btn btn-neutral border">Kembali Ke List Project</a></p>
    </div>

    <div class="col-md-1">
      
    </div>

    <div class="col-md-5 border" style="border-radius: 10px">
      <br><br>
      <h3 class="text-center">Cancel Project</h3>
      <form method="POST" action="/cancel/{{$project->slug}}" enctype="multipart/form-data">

        <div class="form-group">
            <label for="nominal" placeholder='Masukkan Nomimal' class="">{{ __('nominal') }}</label>

            <div>
                <input id="nominal" type="number" class="form-control{{ $errors->has('nominal') ? ' is-invalid' : '' }}" name="nominal" value="{{$project->slot_price}}" required>

                @if ($errors->has('nominal'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nominal') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
          <label for="status" class="">{{ __('Status Cancel Project') }}</label>

          <div>
              <textarea rows="4" cols="50" style="resize:none" id="status" type="text" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" value="{{ old('status') }}" required>Project Dibatalkan, Saldo telah dikembalikan.</textarea>
              @if ($errors->has('status'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('status') }}</strong>
                  </span>
              @endif
          </div>
      </div>

        @csrf


        <div class="form-group">
          <br>
            <div>
                <button type="submit" class="btn btn-danger text-dark">
                    {{ __('Cancel Project') }}
                </button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection