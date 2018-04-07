<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengeluaran;
use App\JenisPengeluaran;
use App\User;
use App\Karyawan;
use DB;
use Illuminate\Support\Facades\Session;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pengeluaran = Pengeluaran::where('hapuskah',0)->get();
        // $kasir = User::join('karyawans', 'users.id', '=', 'karyawans.user_id')->where([['jabatan', 'Kasir'], ['karyawans.hapuskah', 0]])->get();
        // $pengeluaran = DB::table('pengeluarans')
        //             ->join('jenis_pengeluarans','pengeluarans.jenis_pengeluaran_id','=','jenis_pengeluarans.id')
        //             ->where('pengeluarans.hapuskah','=','0')
        //             ->get();

        $pengeluaran = DB::table('pengeluarans')
                ->join('karyawans','pengeluarans.kasir_id','=','karyawans.user_id')
                ->join('users','karyawans.user_id','=','users.id')
                ->join('jenis_pengeluarans','pengeluarans.jenis_pengeluaran_id','=','jenis_pengeluarans.id')
                ->select('pengeluarans.id as Id','jenis_pengeluarans.nama as JenisPengeluaran','pengeluarans.tanggal as TanggalPengeluaran','pengeluarans.nominal as Nominal','pengeluarans.keterangan as Keterangan','pengeluarans.status_lunas as StatusLunas','karyawans.nama as Kasir')
                ->where('pengeluarans.hapuskah','=',0)
                ->get();

        $jenispengeluaran = DB::table('jenis_pengeluarans')
                ->select('id as Id','nama as Nama')
                ->where('hapuskah','=',0)
                ->get();

        $kasir = DB::table('karyawans')
            ->join('users','karyawans.user_id','=','users.id')
            ->select('users.id as Id', 'karyawans.nama as Nama')
            ->where('users.jabatan','=','Kasir')
            ->where('karyawans.hapuskah','=',0)
            ->get();

              
                
        return view('master.pengeluaran',compact('pengeluaran','jenispengeluaran','kasir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenispengeluaran = $request->jenispengeluaran;
        $tanggal = $request->tanggalpengeluaran;
        $nominal = $request->nominal;
        $keterangan = $request->keterangan;
        $statuslunas = $request->statuslunas;
        $kasir = $request->kasir;

        Pengeluaran::create([
            'tanggal' => $tanggal,
            'nominal' => $nominal,
            'keterangan' => $keterangan,
            'status_lunas' => $statuslunas,
            'kasir_id' => $kasir,
            'jenis_pengeluaran_id' => $jenispengeluaran,
            'hapuskah' => 0
        ]);
        Session::flash('flash_msg', 'Data Pengeluaran Berhasil Disimpan');
        return redirect('pengeluaran');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;      

        $pengeluaran = Pengeluaran::find($id);
        return response()->json([
            'id' => $id,
            'jenispengeluaran' => $pengeluaran->jenispengeluaran,
            'tanggal' => $pengeluaran->tanggal,
            'nominal' => $pengeluaran->nominal,
            'keterangan' => $pengeluaran->keterangan,
            'statuslunas' => $pengeluaran->status_lunas,
            'kasir' => $pengeluaran->kasir
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
