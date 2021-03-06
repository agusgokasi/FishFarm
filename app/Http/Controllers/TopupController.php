<?php

namespace App\Http\Controllers;


use Auth;
use App\User;
use App\Topup;
use App\Transaction;
use App\Investasion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TopUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = 0;
        $topups = DB::table('topups')->where('status',$status)->paginate(5);
        $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
        // app.blade.php
        return view('topups.approve', compact('topups', 'newinvestasion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
        // app.blade.php
        return view('topups.create', compact('user','newinvestasion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'user_name' => 'required|min:1',
          'nominal' => 'required|numeric|min:50000|max:900000000000000000',
          'bank' => 'required',
          //'captcha' => 'required|captcha',
          'g-recaptcha-response' => 'required|recaptcha',
          'proof_image' => 'required|mimes:jpeg,jpg,png|max:5000kb',
        ]);
        
        $image = $request->file('proof_image');
        $fileName = time() . rand(1111,9999) .'.'. $image->getClientOriginalExtension();
        $request->file('proof_image')->storeAs('public/proof_image', $fileName);

        $topups = Topup::create([
            'username' => Auth::user()->username,
            'user_name' => $request['user_name'],
            'nominal' => $request['nominal'],
            'bank' => $request['bank'],
            'user_id' => Auth::user()->id,
            'proof_image' => $fileName,
        ]);

        // histori transaksi
        $transactions = Transaction::create([
            'user_id' => $topups->user_id,
            'username' => $topups->username,
            'user_name' => $topups->user_name,
            'topup_id' => $topups->id,
            'nominal' => $topups->nominal,
            'transaction_image_topup' => $topups->proof_image,
            'transaction_type' => 1,
            'status' => 'Menunggu Persetujuan',
        ]);
        return redirect('transaksi')->with('msg', 'Selamat, top up saldo berhasil dilakukan!, Admin akan mengecek, Harap menunggu konfirmasi Admin.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topups = DB::table('topups')->where('id', $id)->first();
        $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
        // app.blade.php
        return view('topups.edit', compact('topups', 'id', 'newinvestasion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $topups = Topup::withAnyStatus()->where('id', $id)->first();
        $user = User::where('id', $topups->user_id)->first();
        $transactions = Transaction::where('topup_id', $topups->id)->first();
        switch($request->get('approve'))
        {
            case 0:
                Topup::postpone($id);
                $transactions->update([
                    'status' => 'Ditunda',
                ]);
                break;
            case 1:
                Topup::approve($id);
                $user->update([
                    'balance' => $user->balance + $topups->nominal ,
                ]);
                $transactions->update([
                    'deposit' => $transactions->deposit + $topups->nominal,
                    'status' => 'Topup Disetujui',
                    // 'username' => $user->username,
                ]);
                break;
            case 2:
                Topup::reject($id);
                $transactions->update([
                    'status' => 'Topup Ditolak',
                    // 'username' => $user->username,
                ]);
                break;
            case 3:
                Topup::postpone($id);
                $transactions->update([
                    'status' => 'Topup Ditunda',
                ]);
                break;
            default:    
                break;

        }
        return redirect('topups')->with('msg', $transactions->status);
    }
}
