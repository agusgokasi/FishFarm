<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Topup;
use App\Withdraw;
use App\Transaction;
use App\Investasion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
    	$users = Auth::user();
        $transactions = Transaction::where('user_id', $users->id)->orderBy('created_at', 'desc')->get();
        // $transactions = Transaction::All();
        $topups = Transaction::orderBy('created_at', 'desc')->where('user_id', $users->id)->where('transaction_type', 1)->paginate(5);
        $withdraws = Transaction::orderBy('created_at', 'desc')->where('user_id', $users->id)->where('transaction_type', 4)->paginate(5);
        $slots = Transaction::orderBy('created_at', 'desc')->where('user_id', $users->id)->where('transaction_type', 2)->paginate(5);
        $profits = Transaction::orderBy('created_at', 'desc')->where('user_id', $users->id)->where('transaction_type', 3)->paginate(5);
        $cancels = Transaction::orderBy('created_at', 'desc')->where('user_id', $users->id)->where('transaction_type', 5)->paginate(5);
        $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
        // app.blade.php
        return view( 'transaksi.index', compact('transactions', 'users', 'topups', 'withdraws', 'slots', 'profits', 'cancels', 'newinvestasion'));
    }

    public function transaksi()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->paginate(5);
        $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
        // app.blade.php
        return view('transaksi.transaksi', compact('transactions', 'newinvestasion'));
    }
}
