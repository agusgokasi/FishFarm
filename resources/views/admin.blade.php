@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="m-b-md">
        <a class="btn btn-primary" href="/projects/create">
            {{ __('Buat Project Baru') }}
        </a> </br></br>
        <a class="btn btn-primary" href="/topups">
            {{ __('Approve User Top Up') }}
        </a> </br></br>
        <a class="btn btn-primary" href="/withdraws">
            {{ __('Informasi Withdraw User') }}
        </a> </br></br>
        <a class="btn btn-primary" href="/users">
            {{ __('Lihat user') }}
        </a>
      </div>
</div>
@endsection
