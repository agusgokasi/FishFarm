@extends('layouts.applogin')



@section('content')
<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-md-5 text-center container_border">
      <a class="navbar-brand text-light" href="/" style="font-family: 'Arapey';font-size: 40px;"><strong>FishFarm</strong></a>
      <div class="card bg-light" style="border-radius: 10px;">
        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="bmd-label-static text-dark"><strong>{{ __('Alamat E-Mail') }}</strong></label>
                <div>
                    <input id="email" type="email" class="text-dark form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="bmd-label-static text-dark"><strong>{{ __('Kata Sandi') }}</strong></label>

                <div>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group d-flex justify-content-center">
                <div>
                {!! Recaptcha::render() !!}
                 @if ($errors->has('g-recaptcha-response'))
                     <span class="help-block text-danger">
                         <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                     </span>
                 @endif
                </div>
                {{-- <!-- <div>
                    <input type="text" id="captcha" class="text-dark form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}" placeholder="Masukkan Captcha" name ="captcha" required>
                </div>--> --}}
            </div>
            <br>
            <div class="form-group">
                <div class="col">
                    <button type="submit" class="btn btn-raised btn-info btn-block">
                        {{ __('Masuk') }}
                    </button>
                    <p>
                    <a class="text-info" href="{{ route('password.request') }}">
                        {{ __('Lupa Password?') }}
                    </a>
                    </p>
                </div>
            </div>
            <div class="form-group">
                <div class="col d-flex justify-content-center text-dark">
                  Belum punya akun?
                  <span style="margin-right: 60px"></span>
                    <a class="text-info" href="{{ route('register') }}">
                        {{ __('Daftar Akun disini!') }}
                    </a>
                </div>
            </div>
          </form>
        </div>
        <hr>
        <div class="form-group">
            <label for="password" class="bmd-label-static text-dark"><strong>{{ __('Atau Login dengan') }}</strong></label>

            <div>
                <a href="{{ url('/auth/google') }}" class="btn btn-raised btn-google"><i class="fa fa-google"></i> &nbsp;Google</a>
                <p class="btn"></p>
                <a href="{{ url('/auth/facebook') }}" class="btn btn-raised btn-info btn-facebook"><i class="fa fa-facebook"></i> &nbsp;Facebook</a>
            </div>
        </div>
      </div>
    </div>
  </div>  
</div>

@endsection
