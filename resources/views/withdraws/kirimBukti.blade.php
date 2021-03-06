@extends('layouts.app')
@section('content')
<div class="container">
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

    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card border border-info" style="border-radius: 10px;">
                <div class="card-body">
                    <div class="container">
                        <div class="card-header">
                            <div class="container">
                                <div class="card-header text-center" style="margin-bottom: 30px">
                                    <a class="card-link h4" href="#">Kirim Bukti Withdraw</a>
                                </div>
                            </div>
                            <form method="POST" action="{{action('WithdrawController@updateBukti', ['id' => $withdraws->id])}}" enctype="multipart/form-data" id="myForm">
                                <div class="form-group">
                                    <label for="admin_name" class="text-dark">{{ __('Atas Nama') }}</label>
                                    <div>
                                        <input id="admin_name" type="text" class="form-control{{ $errors->has('admin_name') ? ' is-invalid' : '' }}" name="admin_name" value="{{ old('admin_name') }}" required>
                                        @if ($errors->has('admin_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('admin_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bank" class="text-dark">{{ __('Nama Bank') }}</label>
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
                                    <label for="nomor_rekening_admin" class="text-dark">{{ __('No. Rekening Admin') }}</label>
                                    <div>
                                        <input id="nomor_rekening_admin" type="text" class="form-control{{ $errors->has('nomor_rekening_admin') ? ' is-invalid' : '' }}" name="nomor_rekening_admin" value="{{ old('nomor_rekening_admin') }}" required>
                                        @if ($errors->has('nomor_rekening_admin'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nomor_rekening_admin') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="user_name" class="text-dark">{{ __('Atas Nama User') }}</label>
                                    <div>
                                        <textarea placeholder="" class="form-control" id="user_name" name="user_name" rows="1" readonly="" style="margin-bottom: 30px">{{$withdraws->user_name}}</textarea>
                                        @if ($errors->has('user_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('user_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bank" class="text-dark">{{ __('Nama Bank User') }}</label>
                                    <div>
                                        <textarea placeholder="" class="form-control" id="bank" name="bank" rows="1" readonly="" style="margin-bottom: 30px">{{$withdraws->bank}}</textarea>
                                        @if ($errors->has('bank'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('bank') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_rekening_user" class="text-dark">{{ __('No. Rekening User') }}</label>
                                    <div>
                                        <textarea placeholder="" class="form-control" id="nomor_rekening_user" name="nomor_rekening_user" rows="1" readonly="" style="margin-bottom: 30px">{{$withdraws->nomor_rekening_user}}</textarea>
                                        @if ($errors->has('nomor_rekening_user'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nomor_rekening_user') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nominal" class="text-dark">{{ __('Nominal User Withdraw') }}</label>
                                    <div>
                                        <textarea placeholder="" class="form-control" id="nominal" name="nominal" rows="1" readonly="" style="margin-bottom: 30px">Rp.{{format_uang($withdraws->nominal)}}</textarea>
                                        @if ($errors->has('nominal'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nominal') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="proof_image_withdraw" class="text-dark">{{ __('Submit Bukti') }}</label>
                                    <div class="custom-file">
                                        <div class="input-group">
                                            <div>
                                                <input id="proof_image_withdraw" type="file" class="custom-file-input{{ $errors->has('proof_image_withdraw') ? ' is-invalid' : '' }}" name="proof_image_withdraw" value="{{ old('proof_image_withdraw') }}" required>
                                                <label class="custom-file-label" for="proof_image_withdraw">Pilih File</label>
                                            </div>
                                        </div>
                                        @if ($errors->has('proof_image_withdraw'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('proof_image_withdraw') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                {{ csrf_field() }}
                                <div class="form-group d-flex justify-content-center" style="margin-bottom: 50px">
                                    <div>
                                       <button type="submit" class="btn btn-info btn-lg" style="margin-right: 100px">
                                       {{ __('Submit') }}
                                       </button>
                                       <!-- <a class="btn btn-neutral btn-lg" href="/withdraws" style="border: solid 1px;">
                                       {{ __('Batal') }}
                                       </a> -->
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