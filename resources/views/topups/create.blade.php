@extends('layouts.app')
@section('content')
<div class="container">
<div class="row d-flex justify-content-center">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li> {{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('msg'))
    <div class="alert alert-succes" style="background-color: red">
        <p> {{ session('msg')}}</p>
    </div>
    @endif
    <div class="col-md-10">
        <div class="card bg-blue border border-info" style="border-radius: 10px;">
            <div class="card-body">
                <div class="container">
                    <div class="card-header">
                        <form method="POST" action="/topups" enctype="multipart/form-data" id="myForm">
                            <div class="card-header text-center" style="margin-bottom: 30px">
                              <a class="card-link h4" href="#">TOPUP SALDO</a>
                            </div>
                            <div class="form-group">
                                <label for="user_name" class="text-dark">{{ __('Atas Nama Yang Saya gunakan Untuk Transfer') }}</label>
                                <div>
                                    <input id="user_name" type="text" class="form-control{{ $errors->has('user_name') ? ' is-invalid' : '' }}" name="user_name" value="{{ old('user_name') }}" required>
                                    @if ($errors->has('user_name'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bank" class="text-dark">{{ __('Bank yang anda gunakan') }}</label>
                                <div>
                                    <input id="bank" type="text" class="form-control{{ $errors->has('bank') ? ' is-invalid' : '' }}" name="bank" value="{{ old('bank') }}" required>
                                    @if ($errors->has('bank'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('bank') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom: 30px">
                                <label for="nominal" class="text-dark">{{ __('Masukkan nominal saldo untuk Top Up (Rp)') }}</label>
                                <div>
                                    <input id="nominal" type="text" class="form-control{{ $errors->has('nominal') ? ' is-invalid' : '' }}" name="nominal" value="{{ old('nominal') }}" required>
                                    @if ($errors->has('nominal'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nominal') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- Featured Image -->
                            <div class="form-group">
                                <label for="proof_image" class="text-dark">{{ __('Submit Bukti') }}</label>
                                <div class="custom-file">
                                    <div class="input-group">
                                        <input id="proof_image" type="file" class="custom-file-input{{ $errors->has('proof_image') ? ' is-invalid' : '' }}" name="proof_image" value="{{ old('proof_image') }}" required>
                                        <label class="custom-file-label" for="proof_image">Pilih File</label>
                                    </div>
                                    @if ($errors->has('proof_image'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('proof_image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <label for="password" class=""></label>
                                <div class="captcha">
                                    <!-- <span>{!! captcha_img() !!}</span> -->
                                    <span style="margin-right: 25px;">{!! Recaptcha::render() !!}</span>
                                    <!-- <button type="button" class="btn btn-success btn-refresh">Refresh</button> -->
                                </div>
                                <!-- <div class="col-md-5">
                                    <input type="text" id="captcha" class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}" placeholder="Masukkan Captcha" name ="captcha" required>
                                    </div> -->
                                @if ($errors->has('g-recaptcha-response'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                                @endif
                            </div>
                            {{ csrf_field() }}
                            <div class="form-group d-flex justify-content-center" style="margin-bottom: 50px">
                                <div>
                                   <button type="submit" class="btn btn-info btn-lg" style="margin-right: 100px">
                                   {{ __('TOP UP') }}
                                   </button>
                                   <a class="btn btn-neutral btn-lg" href="/home" style="border: solid 1px;">
                                   {{ __('Batal') }}
                                   </a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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