@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                Session::forget('success');
                @endphp
            </div>
            @endif

            <div class="card">
                <div class="card-body">
            <div class="panel panel-default">
                <div class="panel-heading">Users Management</div>


                <div class="panel-body">
                <table class="table table-striped" border="solid">
                    <table class="table table-bordered table-responsive">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Id User</td>
                                <th scope="col">Nama User</td>
                                <th scope="col">Email User</td>
                                <th scope="col">Nomor Telepon User</td>
                                <th scope="col">Saldo</td>
                                <th scope="col">Akun di buat pada taggal</td>
                                <th scope="col">Akun di vertifikasi pada tanggal</td>
                                <th scope="col">Apakah Akun Di Ban?</th>
                                <th scope="col" class="text-danger">Banned 10 Tahun/Unban</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($users->count())
                            @foreach($users as $key => $user)
                                <tr>
                                    <td scope="col">{{ ++$key }}</td>
                                    <td scope="col">{{ $user->id }}</td>
                                    <td scope="col">{{ $user->username }}</td>
                                    <td scope="col">{{ $user->email }}</td>
                                    @if($user->phone == null)
                                    <td scope="col">Belum Memasukkan Nomor Telepon</td>
                                    @else
                                    <td scope="col">{{ $user->phone }}</td>
                                    @endif
                                    <td scope="col">Rp{{ format_uang($user->balance) }}</td>
                                    <td scope="col">{{ $user->created_at->format('d/m/Y , H:i') }}</td>
                                    @if($user->email_verified_at == null)
                                    <td scope="col">Belum vertifikasi Email</td>
                                    @else
                                    <td scope="col">{{date('d-m-Y, H:i', strtotime($user->email_verified_at))}}</td>
                                    @endif
                                    <td scope="col">
                                        @if($user->isBanned())
                                        <label class="label label-danger">Iya</label>
                                        @else
                                        <label class="label label-success">Tidak</label>
                                        @endif
                                    </td>
                                    <td scope="col">
                                        @if($user->isBanned())
                                        <form action="/user_revoke/{{$user->id}}" method="post" accept-charset="utf-8">
                                            @csrf
                                            <button type="submit" class="btn btn-default" onclick="return confirm('Unban User?');">Unban</button>
                                        </form>
                                        @else
                                        <form action="/user_banned_tahun/{{$user->id}}" method="post" accept-charset="utf-8">
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Banned User ini?');">Banned</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    </table>
                </div>
                <div class="pagination-bar text-center">
                     {{ $users->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

@endsection