@extends('layouts.app')

@section('add_css')
@endsection

@section('content')
<div class="container">
  @if (session('msg'))
    <div class="alert alert-succes" style="background-color: #14EA62FF">
      <p> {{ session('msg')}}</p>
    </div>
  @endif
  <h1 class="text-center">Halaman Bagi Profit</h1>
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
          <img class="d-block w-100" src="{{asset('storage/project_image/' . $project->project_image)}}" alt="First slide" style="width: 250px; height: 200px">
        </div>
        @if ($project->project_image1==null)
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('storage/project_image/' . $project->project_image)}}" alt="First slide" style="width: 250px; height: 200px">
        </div>
        @else
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('storage/project_image1/' . $project->project_image1)}}" alt="Second slide" style="width: 250px; height: 200px">
        </div>
        @endif
        @if ($project->project_image2==null)
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('storage/project_image/' . $project->project_image)}}" alt="First slide" style="width: 250px; height: 200px">
        </div>
        @else
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('storage/project_image2/' . $project->project_image2)}}" alt="Third slide" style="width: 250px; height: 200px">
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
      <h3 class="text-center">Bagi Profit</h3>
      <form method="POST" action="/profit/{{$project->slug}}" enctype="multipart/form-data" id="myForm">

        <div class="form-group">
            <label for="nominal" placeholder='Masukkan Nomimal' class="">{{ __('nominal') }}</label>

            <div>
                <input id="nominal" type="text" class="form-control{{ $errors->has('nominal') ? ' is-invalid' : '' }}" name="nominal" value="{{ old('nominal') }}" required>

                @if ($errors->has('nominal'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nominal') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
          <label for="status" class="">{{ __('Status profit') }}</label>
          <div>
              <textarea rows="4" cols="50" style="resize:none" id="status" type="text" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" value="{{ old('status') }}" required></textarea>
              @if ($errors->has('status'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('status') }}</strong>
                  </span>
              @endif
          </div>
      </div>
      <!-- Money Report -->
            <div class="form-group">
                  <label for="money_report">{{ __('Submit File') }}</label>
                  <div class="custom-file">
                      <div class="input-group">
                          <input id="money_report" type="file" class="custom-file-input{{ $errors->has('money_report') ? ' is-invalid' : '' }}" name="money_report" value="{{ old('money_report') }}" required>
                          <label class="custom-file-label" for="money_report">Pilih file</label>
                      </div>
                      @if ($errors->has('money_report'))
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('money_report') }}</strong>
                      </span>
                      @endif
                  </div>
              </div>
        @csrf
        <div class="form-group">
          <br>
            <div>
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Bagi Profit') }}
                </button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    jQuery(function($){
       $("#nominal").mask("0.000.000.000.000", {reverse: true});
       $("#myForm").submit(function() {
          $("#nominal").unmask();
        });

    });
    
        $(document).ready( function() {
          $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
        });
    
        $('.btn-file :file').on('fileselect', function(event, label) {
            
            var input = $(this).parents('.input-group').find(':text'),
                log = label;
            
            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }
          
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    
        $("#imgInp").change(function(){
            readURL(this);
        });   
      }); 
    
        
</script>
@section('add_js')
<script>
  $("input[type=file]").change(function () {
  var fieldVal = $(this).val();

  // Change the node's value by removing the fake path (Chrome)
  fieldVal = fieldVal.replace("C:\\fakepath\\", "");
    
  if (fieldVal != undefined || fieldVal != "") {
    $(this).next(".custom-file-label").attr('data-content', fieldVal);
    $(this).next(".custom-file-label").text(fieldVal);
  }

});
  </script> 
@endsection