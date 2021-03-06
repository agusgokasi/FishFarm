<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Investasion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verified'); // biar klo mau akses halaman user (dashboard) harus verifikasi
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $slots = Slot::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(5);
        $investasions = Investasion::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(10);
        $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
        // app.blade.php
        return view('home', compact('investasions' , 'newinvestasion'));

    }
    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
