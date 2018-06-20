<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengeluaran;
use App\JualRumah;

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
    public function notifikasi()
    {
        $pengeluaran = Pengeluaran::where('status_lunas','Hutang')->where('hapuskah',0)->count();
        $jualrumahdp = JualRumah::where('status_jual_rumah', 'Batal')->where('status_jual_rumah','Proses DP')->orWhere('hapuskah', 0)->count();
        $jualrumahkpr = JualRumah::where('status_jual_rumah', 'Proses KPR')->where('hapuskah', 0)->count();
        $jualrumahbelumlengkap = JualRumah::where('status_kelengkapan', 'Tidak Lengkap')->where('hapuskah', 0)->count();
        return view('beranda',compact('pengeluaran','jualrumahdp','jualrumahkpr','jualrumahbelumlengkap'));
    }
    
    public function tentangkami()
    {
        return view('tentangkami');
    }
}
