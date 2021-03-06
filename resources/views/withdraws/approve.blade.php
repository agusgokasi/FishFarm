@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('msg'))
      <div class="alert alert-succes" style="background-color: #14EA62FF">
        <p> {{ session('msg')}}</p>
      </div>
    @endif
    @if($withdraws->count()==0)
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
              <div class="card-header"><h2>Belum Ada User yang Melakukan Withdraw</h2></div>
              <div class="card-body">
              Untuk Ke Page TopUp, <a href="{{ url('/topups') }}">Klik Disini!</a></br></br>
              <!-- Untuk Ke Page Withdraw, <a href="{{ url('/withdraws') }}">Klik Disini!</a></br></br> -->
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
            <th scope="col">Nomor Telepon User</th>
            <th scope="col">Nama Bank User</th>
            <th scope="col">Atas Nama User</th>
            <th scope="col">Nominal</th>
            <th scope="col">Nomor Rekening User</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if($withdraws->count())
          @foreach($withdraws as $key => $withdraw)
          <tr>
            <td>{{ ++$key }}</td>
            <td>{{ date('d-m-Y, H:i', strtotime($withdraw->created_at)) }}</td>
            <td>{{ $withdraw->username }}</td>
            <td>{{ $withdraw->phone}}</td>
            <td>{{ $withdraw->bank }}</td>
            <td>{{ $withdraw->user_name }}</td>
            <td>Rp{{ format_uang($withdraw->nominal) }}</td>
            <td>{{ $withdraw->nomor_rekening_user }}</td>
            <td>
            @if( $withdraw->status == 0 )
            <span class="label label-primary">Pending</span>
            @elseif( $withdraw->status == 1 )
            <span class="label label-success">Approved</span>
            @elseif( $withdraw->status == 2 )
            <span class="label label-danger">Rejected</span>
            @endif
            </td>
            <td><a href="{{action('WithdrawController@edit', $withdraw->id)}}" class="btn btn-warning">Action</a></td> 
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
      <div class="pagination-bar text-center">
       {{ $withdraws->onEachSide(1)->links() }}
      </div>
    </div>
    @endif
</div>
@endsection
