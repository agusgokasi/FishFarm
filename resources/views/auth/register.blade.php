@extends('layouts.appregister')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-5 text-center container_border">
            <strong class="navbar-brand text-light" style="font-family: 'Arapey';font-size: 40px;">Daftar Akun <!-- <a href="/" style="color: white">Crowdfund</a> --></strong>
            <div class="card bg-light" style="border-radius: 10px;">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="myForm">
                        @csrf

                        <div class="form-group">
                            <label for="username" class="bmd-label-static text-dark"><strong>{{ __('Nama') }}</strong></label>

                            <div>
                                <input id="username" type="text" class="text-dark form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="bmd-label-static text-dark"><strong>{{ __('Alamat E-Mail') }}</strong></label>

                            <div>
                                <input id="email" type="email" class="text-dark form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="bmd-label-static text-dark"><strong>{{ __('Nomor Telepon/HP') }}</strong></label>

                            <div>
                                <input id="phone" type="text" class="text-dark form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="bmd-label-static text-dark"><strong>{{ __('Password') }}</strong></label>

                            <div>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="bmd-label-static text-dark"><strong>{{ __('Konfirmasi Password') }}</strong></label>

                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="form-group">
                                <div>{!! Recaptcha::render() !!}
                                 @if ($errors->has('g-recaptcha-response'))
                                     <span class="help-block text-danger">
                                         <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                     </span>
                                 @endif
                                </div>
                            </div>
                            {{-- <!-- <div>
                                <input type="text" id="captcha" class="text-dark form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}" placeholder="Masukkan Captcha" name ="captcha" required>
                            </div>--> --}}
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col">
                                <button type="submit" class="btn btn-raised btn-info btn-block">
                                    {{ __('Daftarkan Akun') }}
                                </button>
                                <br>
                                <p>
                                    <a class="btn btn-raised btn-light btn-block text-dark" href="/">
                                        {{ __('Batal') }}
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col d-flex justify-content-center text-dark">
                              Sudah punya akun?
                                <span style="margin-right: 60px"></span>
                                <a class="text-info" href="{{ route('login') }}">
                                    {{ __('Masuk disini!') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
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
