<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengeluaran;

class BerandaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function beranda()
    {
        return view('beranda');
    }
    public function pengeluaran()
    {
        $pengeluaran = Pengeluaran::where('status_lunas','Hutang')->where('hapuskah',0)->count();
        return view('beranda',compact('pengeluaran'));
    }
    public function tentangkami()
    {
        return view('tentangkami');
    }
}
