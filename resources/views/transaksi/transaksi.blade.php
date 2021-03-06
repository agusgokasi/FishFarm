@extends('layouts.app')

@section('content')
<div class="container">

    {{-- @if (session('msg'))
      <div class="alert alert-succes">
        <p> {{ session('msg')}}</p>
      </div>
    @endif --}}
    <div class="table-responsive">


      <table class="table table-striped" border="solid">
        <thead class="thead-dark" style="background-color: #ddd">
          <tr>
            <th scope="col">Tanggal Transaksi Dibuat</th>
            <!-- <th scope="col">Tanggal Transaksi Diperbaharui</th> -->
            <th scope="col">Jenis Transaksi</th>
            <th scope="col">User ID</td>
            <th scope="col">Nama User</td>
            <th scope="col">Nama Project</td>
            <th scope="col">Nominal Transaksi</td>
            <th scope="col">No. Telp User</td>
            <th scope="col">No.rekenening User</td>
            <th scope="col">A.N User</td>
            <th scope="col">No.rekening Admin</td>
            <th scope="col">A.N Admin</td>
            <th scope="col">Saldo Bertambah</td>
            <th scope="col">Saldo Berkurang</td>
            <th scope="col">Bukti Foto Top UP</td>
            <th scope="col">Bukti Foto Withdraw</td>
            <th scope="col">Status</td>
            <!-- <th scope="col">Action</td> -->
          </tr>
        </thead>
        <tbody>
          @foreach($transactions as $transaction)
          <tr>
            <td scope="col">{{ $transaction->created_at->format('d/m/Y , H:i') }}</td>
            <!-- <td scope="col">{{ $transaction->updated_at->format('d/m/Y , H:i') }}</td> -->
            <td scope="col">
              @if( $transaction->transaction_type == 1 )
              Top Up User
              @elseif( $transaction->transaction_type == 2 )
              User Beli Slot
              @elseif( $transaction->transaction_type == 3 )
              Pembagian Profit
              @elseif( $transaction->transaction_type == 4 )
              Withdraw User
              @elseif( $transaction->transaction_type == 5 )
              Cancel project
              @endif
            </td>
            <td scope="col">{{ $transaction->user_id }}</td>
            <td scope="col">{{ $transaction->username }}</td>
            <td scope="col">@if ($transaction->project_name==null)
              Tidak Ada Data
              @else
              {{ $transaction->project_name }}
            @endif</td>
            <td scope="col">Rp{{ format_uang($transaction->nominal) }}</td>
            <td scope="col">@if ($transaction->phone==null)
              Tidak Ada Data
              @else
              {{ $transaction->phone }}
            @endif</td>
            <td scope="col">@if ($transaction->nomor_rekening_user==null)
              Tidak Ada Data
              @else
              {{ $transaction->nomor_rekening_user }}
            @endif</td>
            <td scope="col">@if ($transaction->user_name==null)
              Tidak Ada Data
              @else
              {{ $transaction->user_name }}
            @endif</td>
            <td scope="col">@if ($transaction->nomor_rekening_admin==null)
              Tidak Ada Data
              @else
              {{ $transaction->nomor_rekening_admin }}
            @endif</td>
            <td scope="col">@if ($transaction->admin_name==null)
              Tidak Ada Data
              @else
              {{ $transaction->admin_name }}
            @endif</td>
            <td scope="col">@if ($transaction->deposit==0)
              Saldo Tidak Bertambah
              @else
              Rp{{ format_uang($transaction->deposit) }}
            @endif</td>
            <td scope="col">@if ($transaction->credit==0)
              Saldo Tidak Bertambah
              @else
              Rp{{ format_uang($transaction->credit) }}
            @endif</td>
            <td scope="col">@if ($transaction->transaction_image_topup==null)
              Tidak ada Gambar
              @else
              <a href="/topup/{{$transaction->transaction_image_topup}}" class="btn btn-outline-warning waves-effect" download="{{$transaction->transaction_image_topup}}">Download Bukti</a>
            @endif</td>
            <td scope="col">@if ($transaction->transaction_image_withdraw==null)
              Tidak ada Gambar
              @else
              <a href="/withdraw/{{$transaction->transaction_image_withdraw}}" class="btn btn-outline-warning waves-effect" download="{{$transaction->transaction_image_withdraw}}">Download Bukti</a>
            @endif</td>
            <td scope="col">{{ $transaction->status }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="pagination-bar text-center">
         {{ $transactions->onEachSide(1)->links() }}
    </div>
</div>
@endsection
