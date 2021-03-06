@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border border-info">
                <div class="card-header h5">Profile</div>
                <!-- <div class="card-body" id="app">
                    <chat-app :user="{{ auth()->user() }}"></chat-app>
                </div> -->

                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5>Hi {{ Auth::user()->username }} You are logged in!</br>
                    Email : {{ Auth::user()->email }}</br></br></h5>
                    
                    @if (auth()->user()->isAdmin())
                    {{-- <a href="{{ url('/admin') }}">Ke Page Admin</a></br></br> --}}
                    <a href="{{ url('/projects/create') }}">Buat Project Baru</a></br></br>
                    <a href="{{ url('/projects') }}">Lihat Project yang tersedia</a></br></br>
                    <a href="{{ url('/users') }}">Lihat List User</a></br></br>
                    <a href="{{ url('/topups') }}">Lihat User Yang Melakukan Top Up</a></br></br>
                    <a href="{{ url('/withdraws') }}">Lihat List User Melakukan Withdraw</a></br></br>
                    <a href="{{ url('/transaksi/transaksi') }}">Lihat Semua history transaksi</a></br></br>
                    <!--<a href="{{ url('/message') }}">Kontak User</a></br></br>-->
                    @else
                    @if($investasions->count()==0)
                    <h5><strong>Anda Belum Melakukan Investasi Apapun, <a href="{{ url('/projects') }}">Mulai Investasi Sekarang!</a></strong></h5>
                    @else
                        <div class="table-responsive">
                          <table class="table table-striped" border="solid">
                            <thead class="thead-dark" style="background-color: #ddd">
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal Investasi</th>
                                <th scope="col">Tanggal Kemajuan Investasi</th>
                                <th scope="col">Nama Project</td>
                                <th scope="col">Nominal Investasi</td>
                                <th scope="col">Status Investasi</td>
                              </tr>
                            </thead>
                            <tbody>
                              @if($investasions->count())
                              @foreach($investasions as $key => $investasion)
                              <tr>
                                <td scope="col">{{ ++$key }}</td>
                                <td scope="col">{{ $investasion->created_at->format('d/m/Y , H:i') }}</td>
                                <td scope="col">{{ $investasion->updated_at->format('d/m/Y , H:i') }}</td>
                                <td scope="col">@if ($investasion->project_name==null)
                                  Tidak Ada Data
                                  @else
                                  {{ $investasion->project_name }}
                                @endif</td>
                                <td scope="col">Rp{{ format_uang($investasion->nominal) }}</td>
                                <td scope="col">{{ $investasion->status }}</td>
                              </tr>
                              @endforeach
                              @endif
                            </tbody>
                          </table>
                        </div>
                      @endif
                        <div class="pagination-bar text-center">
                             {{ $investasions->onEachSide(1)->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
