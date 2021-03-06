<?php

namespace App\Http\Controllers;


use Auth;
use App\User;
use App\Withdraw;
use App\Transaction;
use App\Investasion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $status = 0;
        $withdraws = DB::table('withdraws')->where('status',$status)->paginate(5);
        $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
        // app.blade.php
        return view('withdraws.approve', compact('withdraws', 'newinvestasion'));
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
        return view('withdraws.create', compact('user', 'newinvestasion'));
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
          'user_name' => 'required|string|min:1|max:255',
          'nominal' => 'required|numeric|min:100000|max:900000000000000000',
          'bank' => 'required|min:1|max:25',
          'nomor_rekening_user' => 'required|min:1|max:25',
          //'captcha' => 'required|captcha',
          'g-recaptcha-response' => 'required|recaptcha',
        ]);
        if(Auth::user()->balance >= $request['nominal']){
            
        $withdraws = Withdraw::create([
            'username' => Auth::user()->username,
            'user_name' => $request['user_name'],
            'nominal' => $request['nominal'],
            'bank' => $request['bank'],
            'nomor_rekening_user' => $request['nomor_rekening_user'],
            'user_id' => Auth::user()->id,
            'phone' => $request['phone'],
        ]);
        Auth::user()->update([
                'balance' => Auth::user()->balance - $withdraws->nominal ,
            ]);

        // histori transaksi
        $transactions = Transaction::create([
            'user_id' => $withdraws->user_id,
            'phone' => $withdraws->phone,
            'username' => $withdraws->username,
            'user_name' => $withdraws->user_name,
            'withdraw_id' => $withdraws->id,
            'nominal' => $withdraws->nominal,
            'credit' => $withdraws->nominal,
            'nomor_rekening_user' => $withdraws->nomor_rekening_user,
            'transaction_type' => 4,
            'status' => 'Menunggu Persetujuan',
            ]);
        
        return redirect('transaksi')->with('msg', 'Selamat, withdraw saldo berhasil dilakukan! Saldo anda otomatis terpotong, admin akan mengecek dan transfer jika benar itu anda.');
        }else{
            return redirect('withdraws/create')->with('msg', 'withdraw gagal dilakukan, saldo anda tidak cukup');
        }   
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $withdraws = DB::table('withdraws')->where('id', $id)->first();
        $transactions = Transaction::where('withdraw_id', $withdraws->id)->first();
        $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
        // app.blade.php
        return view('withdraws.edit', compact('withdraws', 'id', 'newinvestasion'));
    } 

    public function editBukti($id)
    {
        $withdraws = DB::table('withdraws')->where('id', $id)->first();
        $transactions = Transaction::where('withdraw_id', $withdraws->id)->first();
        $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
        // app.blade.php
        return view('withdraws.kirimBukti', compact('withdraws', 'id', 'newinvestasion'));
    }

    public function update(Request $request, $id){
        $withdraws = Withdraw::withAnyStatus()->where('id', $id)->first();
        $user = User::where('id', $withdraws->user_id)->first();
        $transactions = Transaction::where('withdraw_id', $withdraws->id)->first();
        switch($request->get('approve'))
        {
            case 0:
                Withdraw::postpone($id);
                $transactions->update([
                    'status' => 'Withdraw Ditunda',
                ]);
                break;
            case 1:
                Withdraw::approve($id);
                $transactions->update([
                    'deposit' => $transactions->deposit - $withdraws->nominal,
                    'status' => 'Withdraw Disetujui, harap menunggu admin transfer dalam kurun waktu 1 x 24 jam.',
                ]);  
                return redirect()->route('withdraws.kirimBukti', ['withdraws' => $withdraws->id]);
                break;
            case 2:
                Withdraw::reject($id);
                $user->update([
                    'balance' => $user->balance + $withdraws->nominal,
                ]);
                $transactions->update([
                    'credit' => 0,
                    'status' => 'Withdraw di tolak, saldo telah dikembalikan.',
                ]);
                break;
            case 3:
                Withdraw::postpone($id);
                $transactions->update([
                    'status' => 'Withdraw Ditunda',
                ]);
                break;
            default:
                break;
        }
        return redirect('withdraws')->with('msg', $transactions->status);
    }

    public function updateBukti(Request $request, $id)
    {
        $withdraws = Withdraw::withAnyStatus()->where('id', $id)->first();
        $transactions = Transaction::where('withdraw_id', $withdraws->id)->first();
        //pakai 2 switch case, approve dan reject
        $image = $request->file('proof_image_withdraw');
        $fileName =  time() . $image->getClientOriginalName();
        $request->file('proof_image_withdraw')->storeAs('public/proof_image_withdraw', $fileName);
        $withdraws->update([
            'admin_name' => $request['admin_name'],
            'nomor_rekening_admin' => $request['nomor_rekening_admin'], //admin yg ngisi
            'proof_image_withdraw' => $fileName,
        ]);

        $transactions->update([
            'admin_name' => $withdraws->admin_name,
            'nomor_rekening_admin' =>$withdraws->nomor_rekening_admin,
            'nomor_rekening_user' =>$withdraws->nomor_rekening_user,
            'transaction_image_withdraw' =>$withdraws->proof_image_withdraw,
            'status' =>'Withdraw Disetujui, Dana telah di transfer',
        ]);
        return redirect('withdraws')->with('msg', 'Bukti Transfer Telah Dikirim');
    }
}
