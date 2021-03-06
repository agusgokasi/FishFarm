@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
  <div class="col-md-7">
  <div class="card">
      <div class="card-header">Approval Withdraw</div>
      <div class="card-body">
      <form method="post" action="/withdraws/{{$id}}/edit" enctype="multipart/form-data">
        @csrf
         <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <lable>Approval</lable>
                <select name="approve">
                  <!--<option value="0" @if($withdraws->status==0)selected @endif>Pending</option>-->
                  <option value="1" @if($withdraws->status==1)selected @endif>Approve</option>
                  <option value="2" @if($withdraws->status==2)selected @endif>Reject</option>
                </select>
            </div>
        </div>
        <br><br><br>
        <div class="form-group d-flex justify-content-center" style="margin-bottom: 50px">
          <div>
                 <button type="submit" class="btn btn-info btn-md" style="margin-right: 100px">
                 {{ __('Update') }}
                 </button>
                 <a class="btn btn-neutral btn-md" href="/withdraws" style="border: solid 1px;">
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
@endsection