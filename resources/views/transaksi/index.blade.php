@extends('layouts.app')

@section('content')
<div class="container">

	@if (session('msg'))
      <div class="alert alert-succes" style="background-color: #14EA62FF">
        <p> {{ session('msg')}}</p>
      </div>
    @endif

    @if($transactions->count()==0)
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
            	<div class="card-header">Anda Belum Melakukan Transaksi Apapun. </div>
            	<div class="card-body">
			        Untuk TopUp, <a href="{{ url('/topups/create') }}">Klik Disini!</a></br></br>
			        <!--@if (auth()->user()->saldo==0)
			        Untuk Withdraw, <a href="{{ url('#') }}">Klik Disini!</a></br></br>
			        @else
			        @endif-->
			        Untuk Withdraw, <a href="{{ url('/withdraws/create') }}">Klik Disini!</a></br></br>
			        
			        Untuk Investasi, <a href="{{ url('/projects') }}">Klik Disini!</a></br></br>
		    	</div>
        	</div>
        </div>
    </div>
    @else
    @if($topups->count()==0)
    @else
	<h1>Top Up</h1>
	<div class="table-responsive">
		<table class="table table-striped" border="solid">
			<thead class="thead-dark">
				<tr>
					<th scope="col">No.</th>
					<th scope="col">Tanggal Top Up</th>
					<th scope="col">Nominal Top Up</th>
					<th scope="col">Bukti Foto</th>
					<th scope="col">Saldo Bertambah</th>
					<!-- <th scope="col">Saldo Berkurang</th> -->
					<th scope="col">Status</th>
				</tr>
			</thead>
			
			<tbody>
                @if($topups->count())
				@foreach($topups as $key => $transaction)
					@if ($transaction->transaction_type == 1)
						<tr>
							<td scope="col">{{ ++$key }}</td>
							<td scope="col">{{$transaction->created_at->format('d/m/Y , H:i')}}</td>
							<td scope="col">Rp{{ format_uang($transaction->nominal) }}</td>
							<td><a href="/topup/{{$transaction->transaction_image_topup}}" class="btn btn-outline-warning waves-effect" download="{{$transaction->transaction_image_topup}}">Download Bukti</a></td>
							<!--<td><a href="/storage/{{$transaction->transaction_image_topup}}" class="btn btn-outline-warning waves-effect" download="{{$transaction->transaction_image_topup}}">Download Bukti</a></td>-->
							<td scope="col">@if ($transaction->deposit==0)
								              Tidak Bertambah
								              @else
								              Rp{{ format_uang($transaction->deposit) }}
								            @endif</td>
							<!-- <td scope="col"> Rp{{format_uang($transaction->credit)}} </td> -->
							<td scope="col"> {{$transaction->status}} </td>
						</tr>
					@endif		
				@endforeach
				@endif
			</tbody>
		</table>
		<div class="pagination-bar text-center">
         {{ $topups->onEachSide(1)->links() }}
        </div>
	</div>
	<br>
	<br>
	<br>
	<hr>
	@endif
	@if($withdraws->count()==0)
	@else
	<h1>Withdraw</h1>
	<div class="table-responsive">
		<table class="table table-striped" border="solid">
			<thead class="thead-dark">
				<tr>
					<th scope="col">No.</th>
					<th scope="col">Tanggal Withdraw</th>
					<th scope="col">Nominal Withdraw</th>
					<th scope="col">Nama Admin</th>
					<th scope="col">No. Rekening Admin</th>
					<th scope="col">Bukti Foto</th>
					{{-- <th scope="col">Saldo Bertambah</th> --}}
					<th scope="col">Saldo Berkurang</th>
					<th scope="col">Status</th>
				</tr>
			</thead>
			
			<tbody>					
				@if($withdraws->count())
				@foreach($withdraws as $key => $transaction)
					@if ($transaction->transaction_type == 4)
						<tr>
							<td scope="col">{{ ++$key }}</td>
							<td scope="col">{{$transaction->created_at->format('d/m/Y , H:i')}}</td>
							<td scope="col">Rp{{ format_uang($transaction->nominal) }}</td>
							<td scope="col">@if ($transaction->admin_name==null)
								              Tidak Ada Data
								              @else
								              {{ $transaction->admin_name }}
								            @endif</td>
							<td scope="col">@if ($transaction->nomor_rekening_admin==null)
								              Tidak Ada Data
								              @else
								              {{ $transaction->nomor_rekening_admin }}
								            @endif</td>
							<td scope="col">@if ($transaction->transaction_image_withdraw==null)
				              Tidak ada Gambar
				              @else
				              <a href="/withdraw/{{$transaction->transaction_image_withdraw}}" class="btn btn-outline-warning waves-effect" download="{{$transaction->transaction_image_withdraw}}">Download Bukti</a>
				            @endif</td>
							{{-- <td scope="col">@if ($transaction->deposit==0)
								              Saldo Tidak Bertambah
								              @else
								              Rp{{ format_uang($transaction->deposit) }}
								            @endif</td> --}}
							<td scope="col">@if ($transaction->credit==0)
								              Saldo Tidak Berkurang
								              @else
								              Rp{{ format_uang($transaction->credit) }}
								            @endif</td>
							<td scope="col"> {{$transaction->status}} </td>
						</tr>
					@endif		
				@endforeach
				@endif
			</tbody>
		</table>
		<div class="pagination-bar text-center">
         {{ $withdraws->onEachSide(1)->links() }}
        </div>
	</div>
	<br>
	<br>
	<br>
	<hr>
	@endif
	@if($slots->count()==0)
	@else
	<h1>Slot</h1>
	
	<div class="table-responsive">
		<table class="table table-striped" border="solid">
			<thead class="thead-dark">
				<tr>
					<th scope="col">No.</th>
					<th scope="col">Tanggal Beli</th>
					<th scope="col">Nominal Slot</th>
					<th scope="col">Project</th>
					<!-- <th scope="col">Saldo Bertambah</th> -->
					<th scope="col">Saldo Berkurang</th>
					<th scope="col">Status</th>
				</tr>
			</thead>
			
			<tbody>
				@if($slots->count())
				@foreach($slots as $key => $transaction)
					@if ($transaction->transaction_type == 2)
						<tr>
							<td scope="col">{{ ++$key }}</td>
							<td scope="col">{{$transaction->created_at->format('d/m/Y , H:i')}}</td>
							<td scope="col">Rp{{ format_uang($transaction->nominal) }}</td>
							<td scope="col">{{ $transaction->project_name }}</td>
							<!-- <td scope="col"> Rp{{format_uang($transaction->deposit)}} </td> -->
							<td scope="col"> Rp{{format_uang($transaction->credit)}} </td>
							<td scope="col"> {{$transaction->status}} </td>
						</tr>
					@endif			
				@endforeach
				@endif
			</tbody>
		</table>
		<div class="pagination-bar text-center">
         {{ $slots->onEachSide(1)->links() }}
        </div>
	</div>

	<br>
	<br>
	<br>
	<hr>
	@endif
	@if($profits->count()==0)
	@else
	<h1>Profit</h1>
	
	<div class="table-responsive">
		<table class="table table-striped" border="solid">
			<thead class="thead-dark">
				<tr>
					<th scope="col">No.</th>
					<th scope="col">Tanggal Dibagikan</th>
					<th scope="col">Nominal Profit</th>
					<th scope="col">Project</th>	
					<th scope="col">Saldo Bertambah</th>
					<!-- <th scope="col">Saldo Berkurang</th> -->
					<th scope="col">Status</th>
				</tr>
			</thead>
			
			<tbody>
				@if($profits->count())
				@foreach($profits as $key => $transaction)
					@if ($transaction->transaction_type == 3)
						<tr>
							<td scope="col">{{ ++$key }}</td>
							<td scope="col">{{$transaction->created_at->format('d/m/Y , H:i')}}</td>
							<td scope="col">Rp{{ format_uang($transaction->nominal) }}</td>
							<td scope="col">{{ $transaction->project_name }}</td>
							<td scope="col"> Rp{{format_uang($transaction->deposit)}} </td>
							<!-- <td scope="col"> Rp{{format_uang($transaction->credit)}} </td> -->
							<td scope="col"> {{$transaction->status}} </td>
						</tr>
					@endif
				@endforeach
				@endif
			</tbody>
		</table>
		<div class="pagination-bar text-center">
         {{ $profits->onEachSide(1)->links() }}
        </div>
	</div>

	<br>
	<br>
	<br>
	<hr>
	@endif
	@if($cancels->count()==0)
	@else
	<h1>Pembatalan Project</h1>
	
	<div class="table-responsive">
		<table class="table table-striped" border="solid">
			<thead class="thead-dark">
				<tr>
					<th scope="col">No.</th>
					<th scope="col">Tanggal Dibatalkan</th>
					<th scope="col">Nominal Kembali</th>
					<th scope="col">Project</th>	
					<th scope="col">Saldo Bertambah</th>
					<!-- <th scope="col">Saldo Berkurang</th> -->
					<th scope="col">Status</th>
				</tr>
			</thead>
			
			<tbody>
				@if($cancels->count())
				@foreach($cancels as $key => $transaction)
					@if ($transaction->transaction_type == 5)
						<tr>
							<td scope="col">{{ ++$key }}</td>
							<td scope="col">{{$transaction->created_at->format('d/m/Y , H:i')}}</td>
							<td scope="col">Rp{{ format_uang($transaction->nominal) }}</td>
							<td scope="col">{{ $transaction->project_name }}</td>
							<td scope="col"> Rp{{format_uang($transaction->deposit)}} </td>
							<!-- <td scope="col"> Rp{{format_uang($transaction->credit)}} </td> -->
							<td scope="col"> {{$transaction->status}} </td>
						</tr>
					@endif
				@endforeach
				@endif
			</tbody>
		</table>
		<div class="pagination-bar text-center">
         {{ $cancels->onEachSide(1)->links() }}
        </div>
	</div>
	@endif
	@endif
</div>
@endsection
