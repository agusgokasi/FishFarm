@extends('layouts.app')
<style>
    .captcha{
    margin:5px;
    }
</style>
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
            <div class="card border border-info bg-blue" style="border-radius: 10px;">
                <div class="card-body">
               
        <div class="container">
            <div class="card-header">
                    <form method="POST" action="/withdraws" enctype="multipart/form-data" id="myForm">
                        <!-- <p align="center"> WITHDRAW </p> -->
                        <div class="card-header text-center" style="margin-bottom: 30px">
                              <a class="card-link h4" href="#">WITHDRAW SALDO</a>
                            </div>
                        <!-- <div class="form-group row">
                            <label for="username" style="resize:none" class="col-md-4 col-form-label text-md-right">{{ __('Nama Anda') }}</label>
                            
                            <div class="col-md-6">
                                
                                <textarea placeholder="" class="form-control" id="username" name="username" rows="1" readonly="">{{$user->username}}</textarea>
                            
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div> -->
                        <div class="form-group">
                            <label for="user_name" class="text-dark">{{ __('Atas nama yang saya pakai untuk transfer') }}</label>
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
                            <label for="bank" class="text-dark">{{ __('Bank yang saya gunakan') }}</label>
                            <div>
                                <input id="bank" type="text" class="form-control{{ $errors->has('bank') ? ' is-invalid' : '' }}" name="bank" value="{{ old('bank') }}" required>
                                @if ($errors->has('bank'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bank') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nominal" class="text-dark">{{ __('Masukkan nominal saldo untuk Withdraw (Rp)') }}</label>
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
                            <label for="nomor_rekening_user" class="text-dark">{{ __('Nomor rekening saya') }}</label>
                            <div>
                                <input id="nomor_rekening_user" type="text" class="form-control{{ $errors->has('nomor_rekening_user') ? ' is-invalid' : '' }}" name="nomor_rekening_user" value="{{ old('nomor_rekening_user') }}" required>
                                @if ($errors->has('nomor_rekening_user'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nomor_rekening_user') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="text-dark">{{ __('Nomor Telepon/HP yang dapat dihubungi') }}</label>

                            <div>
                                <input id="phone" type="text" class="text-dark form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="form-group d-flex justify-content-center">
                            <label for="password" class=""></label>
                            <div class="col-md-6 captcha">
                                <!-- <span>{!! captcha_img() !!}</span> -->
                                <span style="margin-right: 25px;">{!! Recaptcha::render() !!}</span>
                                <!-- <button type="button" class="btn btn-success btn-refresh">Refresh</button> -->
                            </div>

                            <!-- <div class="col-md-6 offset-md-4">
                                <input type="text" id="captcha" class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}" placeholder="Masukkan Captcha" name ="captcha" required>
                            </div>-->
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <br>
                        {{ csrf_field() }}
                        <div class="form-group d-flex justify-content-center" style="margin-bottom: 50px">
                            <div>
                               <button type="submit" class="btn btn-info btn-lg" style="margin-right: 100px">
                               {{ __('WITHDRAW') }}
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
       $("#nomor_rekening_user").mask("0000-0000-0000-0000", {reverse: false});
       $("#myForm").submit(function() {
          $("#nominal").unmask();
          $("#nomor_rekening_user").unmask();
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
    
    
    
    jQuery(function($){
       $("#phone").mask("0000-0000-000000", {reverse: false});
       $("#myForm").submit(function() {
          $("#phone").unmask();
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

