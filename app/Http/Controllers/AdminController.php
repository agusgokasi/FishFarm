<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Investasion;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function adminDashboard()
	{
		$newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
		// app.blade.php
    	return view('admin', compact('newinvestasion'));
	}

	public function index()
	{
      	$role = 1;
      	$users = User::where('role',$role)->withBanned()->paginate(10);
      	$newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
      	// app.blade.php
      	return view('users.list', compact('users','newinvestasion'));
  	}


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function revoke($id)
    {
        if(!empty($id)){
            $user = User::withBanned()->find($id);
            $user->unban();
        }


        return redirect()->route('users.list')->with('success','Unban User Sukses!');
    }
    public function ban_tahun(Request $request, $id)
    {
        $input = $request->all();
        if(!empty($id)){
            $user = User::withBanned()->find($id);
            $user->bans()->create([
                'expired_at' => '+120 month',
                'comment'=>'Akun anda Telah di Banned 10 tahun! Harap Hubungi admin untuk keterangan lebih lanjut',
            ]);
        }


        return redirect()->route('users.list')->with('success','Banned User sukses!');
    }

}