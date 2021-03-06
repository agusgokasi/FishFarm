@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-md-10">
      <div class="card border border-info">
        <div class="container">
          <div class="card-header text-center" style="margin-bottom: 30px">
            <a class="card-link h4" href="/projects/{{$project->id}}/edit">Edit Project</a>
         </div>
         <div class="card-body">
            <form method="POST" action="/projects/{{$project->id}}" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="title" class="text-dark">{{ __('Judul Proyek') }}</label>
                  <div>
                     <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                        value="{{ old('title') ? old('title') : $project->title }}" required>
                     @if ($errors->has('title'))
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('title') }}</strong>
                     </span>
                     @endif
                  </div>
               </div>
               <div class="form-group">
                  <label for="opened_at" class="text-dark">{{ __('Tanggal dibuat project') }}</label>
                  <div>
                     <input id="opened_at" type="datetime" class="form-control{{ $errors->has('opened_at') ? ' is-invalid' : '' }}" name="opened_at"
                        value="{{ old('opened_at') ? old('opened_at') : $project->opened_at }}" required>
                     @if ($errors->has('opened_at'))
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('opened_at') }}</strong>
                     </span>
                     @endif
                  </div>
               </div>
               <div class="form-group">
                  <label for="closed_at" class="text-dark">{{ __('Tanggal ditutup project') }}</label>
                  <div>
                     <input id="closed_at" type="datetime" class="form-control{{ $errors->has('closed_at') ? ' is-invalid' : '' }}" name="closed_at"
                        value="{{ old('closed_at') ? old('closed_at') : $project->closed_at }}" required>
                     @if ($errors->has('closed_at'))
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('closed_at') }}</strong>
                     </span>
                     @endif
                  </div>
               </div>
               <div class="form-group">
                  <label for="description" class="text-dark">{{ __('Deskripsi Project') }}</label>
                  <div>
                     <textarea rows="4" cols="50" style="resize:none" id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"
                        value="" required>{{ old('description') ? old('description') : $project->description }}</textarea>
                     @if ($errors->has('description'))
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('description') }}</strong>
                     </span>
                     @endif
                  </div>
               </div>
               <div class="form-group">
                  <label for="address" class="text-dark">{{ __('Alamat Project') }}</label>
                  <div>
                     <textarea rows="4" cols="50" style="resize:none" id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address"
                        value="" required>{{ old('address') ? old('address') : $project->address }}</textarea>
                     @if ($errors->has('address'))
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('address') }}</strong>
                     </span>
                     @endif
                  </div>
               </div>
               <div class="form-group">
                  <label for="project_price" class="text-dark">{{ __('Dana yang Dibutuhkan') }}</label>
                  <div>
                     <input id="project_price" type="number" class="form-control{{ $errors->has('project_price') ? ' is-invalid' : '' }}" name="project_price"
                        value="{{ old('project_price') ? old('project_price') : $project->project_price }}" required>
                     @if ($errors->has('project_price'))
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('project_price') }}</strong>
                     </span>
                     @endif
                  </div>
               </div>
               <div class="form-group">
                  <label for="slot" class="text-dark">{{ __('Banyak Slot') }}</label>
                  <div>
                     <input id="slot" type="number" class="form-control{{ $errors->has('slot') ? ' is-invalid' : '' }}" name="slot"
                        value="{{ old('slot') ? old('slot') : $project->slot }}" required>
                     @if ($errors->has('slot'))
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('slot') }}</strong>
                     </span>
                     @endif
                  </div>
               </div>
              <!-- Featured Image -->
              <div class="form-group">
                <label for="project_image">{{ __('Submit Gambar') }}</label>
                <div class="custom-file">
                    <div class="input-group">
                        <input id="project_image" type="file" class="custom-file-input{{ $errors->has('project_image') ? ' is-invalid' : '' }}" name="project_image" value="{{ old('project_image')}}" required>
                        <label class="custom-file-label" for="project_image">Pilih file</label>
                    </div>
                    @if ($errors->has('project_image'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('project_image') }}</strong>
                    </span>
                    @endif
                </div>
              </div>
              <!-- Featured Image1 -->
              <div class="form-group">
                  <label for="project_image1">{{ __('Submit Gambar') }}</label>
                  <div class="custom-file">
                      <div class="input-group">
                          <input id="project_image1" type="file" class="form-control custom-file-input{{ $errors->has('project_image1') ? ' is-invalid' : '' }}" name="project_image1" value="{{ old('project_image1') }}" required>
                          <label class="custom-file-label" for="project_image1">Pilih file</label>
                      </div>
                      @if ($errors->has('project_image1'))
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('project_image1') }}</strong>
                      </span>
                      @endif
                  </div>
              </div>
              <!-- Featured Image2 -->
              <div class="form-group">
                  <label for="project_image2">{{ __('Submit Gambar') }}</label>
                  <div class="custom-file">
                      <div class="input-group">
                          <input id="project_image2" type="file" class="form-control custom-file-input{{ $errors->has('project_image2') ? ' is-invalid' : '' }}" name="project_image2" value="{{ old('project_image2') }}" required>
                          <label class="custom-file-label" for="project_image2">Pilih file</label>
                      </div>
                      @if ($errors->has('project_image2'))
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('project_image2') }}</strong>
                      </span>
                      @endif
                  </div>
              </div>
               <br style="margin-bottom: 150px">
               {{ csrf_field() }}
               <div class="form-group d-flex justify-content-center" style="margin-bottom: 50px">
                  <div>
                     <button type="submit" class="btn btn-info btn-lg" style="margin-right: 100px">
                     {{ __('Edit Project') }}
                     </button>
                     <a class="btn btn-neutral btn-lg border border-dark" href="/projects/{{ $project->slug }}">
                     {{ __('Kembali') }}
                     </a>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection

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