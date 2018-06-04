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
        $pengeluaran = Pengeluaran::where('hapuskah', 0)->get();
        $jenispengeluaran = JenisPengeluaran::where('hapuskah',0)->get();
        $kasir = User::where('jabatan','Kasir')->get();

              
                
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
            'jenispengeluaran' => $pengeluaran->jenis_pengeluaran_id,
            'tanggal' => $pengeluaran->tanggal,
            'nominal' => $pengeluaran->nominal,
            'keterangan' => $pengeluaran->keterangan,
            'statuslunas' => $pengeluaran->status_lunas,
            'kasir' => $pengeluaran->kasir_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->pengeluaran;
        $jenispengeluaran = $request->jenispengeluaran;
        $tanggal = $request->tanggalpengeluaran;
        $nominal = $request->nominal;
        $keterangan = $request->keterangan;
        $statuslunas = $request->statuslunas;
        $kasir = $request->kasir;

        $pengeluaran = Pengeluaran::find($id);

        $pengeluaran->jenis_pengeluaran_id = $jenispengeluaran;
        $pengeluaran->tanggal = $tanggal;
        $pengeluaran->nominal = $nominal;
        $pengeluaran->keterangan = $keterangan;
        $pengeluaran->status_lunas = $statuslunas;
        $pengeluaran->kasir_id = $kasir;

        $pengeluaran->save();

        Session::flash('flash_msg', 'Data Pengeluaran Berhasil Disimpan');
        return redirect('pengeluaran');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pengeluaran = Pengeluaran::find($request->pengeluaran);
        $pengeluaran->hapuskah = 1;
        $pengeluaran->save();

        Session::flash('flash_msg', 'Data pengeluaran Berhasil Dihapus');
        return redirect('pengeluaran');
    }
}
