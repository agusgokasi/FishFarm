@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('msg'))
      <div class="alert alert-succes" style="background-color: #14EA62FF">
        <p> {{ session('msg')}}</p>
      </div>
    @endif
    @if($topups->count()==0)
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
              <div class="card-header"><h2>Belum Ada User yang Melakukan TopUp</h2></div>
              <div class="card-body">
              <!-- Untuk Ke Page TopUp, <a href="{{ url('/topups') }}">Klik Disini!</a></br></br> -->
              Untuk Ke Page Withdraw, <a href="{{ url('/withdraws') }}">Klik Disini!</a></br></br>
              Untuk Ke Page Project, <a href="{{ url('/projects') }}">Klik Disini!</a></br></br>
              </div>
          </div>
        </div>
    </div>
    @else
    <div class="table-responsive">
      <table class="table table-striped" border="solid">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Tanggal Transaksi</th>
            <th scope="col">Nama User</th>
            <th scope="col">Nama Bank User</th>
            <th scope="col">Atas Nama</th>
            <th scope="col">Nominal</th>
            <th scope="col">Bukti Foto</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if($topups->count())
          @foreach($topups as $key => $topup)
          <tr>
            <td>{{ ++$key }}</td>
            <td>{{ date('d-m-Y, H:i', strtotime($topup->created_at)) }}</td>
            <td>{{ $topup->username }}</td>
            <td>{{ $topup->bank }}</td>
            <td>{{ $topup->user_name }}</td>
            <td>Rp{{ format_uang($topup->nominal) }}</td>
            <td><a href="/topup/{{$topup->proof_image}}" class="btn btn-outline-warning waves-effect" download="{{$topup->proof_image}}">Download Bukti</a></td>
            <td>
            @if( $topup->status == 0 )
            <span class="label label-primary">Pending</span>
            @elseif( $topup->status == 1 )
            <span class="label label-success">Approved</span>
            @elseif( $topup->status == 2 )
            <span class="label label-danger">Rejected</span>
            @endif
            </td>
            <td><a href="{{action('TopupController@edit', $topup->id)}}" class="btn btn-warning">Action</a></td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
      <div class="row d-flex justify-content-center">
      <div class="pagination-bar text-center" style="margin-top: 50px">
       {{ $topups->onEachSide(1)->links() }}
      </div>
      </div>
    </div>
    @endif
</div>
@endsection
