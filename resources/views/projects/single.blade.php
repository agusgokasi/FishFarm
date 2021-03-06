@extends('layouts.app')

@section('add_css')
  <style type="text/css" media="screen">
    .carousel-inner > .carousel-item > img { width:100%; height:350px; }
    .slot_single{
      height:200px;
      overflow-y: scroll;
    }
  </style>
@endsection

@section('content')
<div class="container">
  @if (session('msg'))
    <div class="alert alert-succes" style="background-color: #14EA62FF">
      <p> {{ session('msg')}}</p>
    </div>
  @endif
  @if (session('msg1'))
    <div class="alert alert-succes" style="background-color: red">
      <p> {{ session('msg1')}}</p>
    </div>
  @endif
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{asset('project_image/' . $project->project_image)}}" alt="First slide">
      </div>
      @if ($project->project_image1==null)
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('project_image/' . $project->project_image)}}" alt="First slide">
      </div>
      @else
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('project_image1/' . $project->project_image1)}}" alt="Second slide">
      </div>
      @endif
      @if ($project->project_image2==null)
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('project_image/' . $project->project_image)}}" alt="First slide">
      </div>
      @else
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('project_image2/' . $project->project_image2)}}" alt="Third slide">
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
  </div><br><br><br>
  <div class="container">
    <div class="row">
      <div class="col-md-6 border border-dark" style="border-radius: 40px">
        <h2 class="text-center" style="margin-top: 30px">{{$project->title}}</h2>
        <div class="nav-tabs-navigation d-flex justify-content-center">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><i class="fas fa-home"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><i class="fas fa-info"></i></a>
                    </li>
                    @if ($project->status ==1)
                    @else
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#report" role="tab"><i class="fas fa-book"></i></a>
                    </li>
                    @endif
                    @if ($project->status ==3)
                    @else
                      @if ($project->isOwner())
                      <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><i class="fas fa-gear"></i></a>
                      </li>
                      @endif
                    @endif
                </ul>
            </div>
        </div>
        <!-- Tab panes -->
        <div class="tab-content container border border-info" style="border-radius: 10px">
            <div class="tab-pane active" id="home" role="tabpanel">
              <br>
              <p><i class="fas fa-calendar-alt"></i> Project dimulai : {{date('d-m-Y', strtotime($project->opened_at))}}</p>
              <p><i class="fas fa-calendar"></i> Project ditutup pada : {{date('d-m-Y', strtotime($project->closed_at))}}</p>
              <p><i class="fas fa-money-bill-alt"></i> Dana yang dibutuhkan : Rp.{{format_uang($project->project_price)}}</p>
              <p><i class="fas fa-list-ul"></i> Slot yang tersedia : {{$project->slot}}</p>
              <p><i class="fas fa-coins"></i> Jumlah uang per slot : Rp.{{format_uang($project->slot_price)}}</p>
              @if ($project->progress == $project->project_price)
                <p><i class="fas fa-spinner"></i> Progress : Terdanai Penuh</p>
              @else
                <p><i class="fas fa-spinner"></i> Progress : Rp.{{format_uang($project->progress)}} / Rp.{{format_uang($project->project_price)}}</p>
              @endif
              <p><i class="fas fa-map"></i> Alamat Project : {{$project->address}}</p>
            </div>
            <div class="tab-pane" id="profile" role="tabpanel">
              <br>
              <p><i class="fas fa-scroll"></i> Deskripsi Project : {{$project->description}}</p>
            </div>
            @if ($project->money_report==null)
            <div class="tab-pane" id="report" role="tabpanel">
              <br>
              <p><i class="fas fa-book"></i> Tidak Ada Laporan Keuangan</p>
              
            </div>
            @else
            <div class="tab-pane" id="report" role="tabpanel">
              <br>
              <p><i class="fas fa-book"></i> Download <a href="/moneyreport/{{$project->money_report}}" download="{{$project->money_report}}"> Laporan Keuangan</a></p>
            </div>
            @endif
            {{-- admin --}}
            <div class="tab-pane" id="messages" role="tabpanel">
            @if ($project->isOwner()) 
                <br>
                <h5 class="text-center">Menu Admin</h5>
                <hr>
                @if ($project->progress == $project->project_price)
                <p class="d-flex justify-content-center"><a href="/profit/{{ $project->slug }}" class="btn btn-neutral text-black border border-dark">Bagi Profit</a></p>
                <p class="d-flex justify-content-center"><a href="/profitAkhir/{{ $project->slug }}" class="btn btn-neutral text-black border border-dark">Bagi Profit Akhir</a></p>
                <p class="d-flex justify-content-center"><a href="/cancel/{{ $project->slug }}" class="btn btn-danger text-dark" >Cancel Project</a></p>
                @elseif ($project->progress == 0)
                <p class="d-flex justify-content-center"><a href="/projects/{{$project->id}}/edit" class="btn btn-warning btg-lg text-dark">Edit Project</a></p>
                <form method="POST" action="/projects_delete/{{$project->id}}" class="d-flex justify-content-center" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-danger text-dark" onclick="return confirm('Delete Project ini?');">
                      {{ __('Hapus Project') }}
                  </button>
                </form>
                @else
                <p class="d-flex justify-content-center"><a href="/cancel/{{ $project->slug }}" class="btn btn-danger text-dark" >Cancel Project</a></p>
                @endif
                <br>
              @endif
            </div>
        </div>
        <br>
        <p class="d-flex justify-content-center"><a href="/projects" class="btn btn-round btn-default btg-lg">Kembali Ke List Project</a></p>
      </div>

      {{-- button for slots --}}
      @if (Auth::user())
        <div class="col-md-6 border border-dark" style="border-radius: 40px">
          <br>
          <h2 class="text-center">Beli Slot</h2>
          <div class="container slot_single text-center">
            @foreach ($slots as $slot)
              @if ($slot->status == 0)
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-slotid="{{$slot->id}}" data-userid="{{Auth::user()->id}}" style="margin:5px">Rp{{format_uang($slot->price)}}</button>
                @include('slots.formBuySlot')
              @else
                <p class="btn btn-neutral border" style="margin:5px">Rp{{format_uang($slot->price)}}</p>
              @endif
            @endforeach
          </div>
          <div class="container text-center">
            <br>
              <strong>*Nb : Slot yang berwarna putih telah terbeli</strong>
            <br>
            <br>
          </div>
        </div>
      @endif
      
    </div>
  </div>
</div>
@endsection