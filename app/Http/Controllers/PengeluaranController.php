<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengeluaran;
use App\JenisPengeluaran;
use App\User;
use App\Karyawan;
use DB;
use App\Pembangunan;
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
        $pembangunan = Pembangunan::where('tanggal_selesai','=', null)->where('hapuskah',0)->get();
              
        
        return view('master.pengeluaran',compact('pengeluaran','jenispengeluaran','kasir','pembangunan'));
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
        $tanggal = $request->tanggal;
        $nominal = $request->nominal;
        $keterangan = $request->keterangan;
        $statuslunas = $request->statuslunas;
        $kasir = $request->kasir;
        $pembangunan = $request->pembangunan;

        Pengeluaran::create([
            'tanggal' => $tanggal,
            'nominal' => $nominal,
            'keterangan' => $keterangan,
            'status_lunas' => $statuslunas,
            'kasir_id' => $kasir,
            'jenis_pengeluaran_id' => $jenispengeluaran,
            'pembangunan_id' => $pembangunan,
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
            'pembangunan' => $pengeluaran->pembangunan_id,
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
        $tgl = $request->tanggal;
        $tanggal = Pengeluaran::changeDateFormat($tgl);

        $nominal = $request->nominal;
        $keterangan = $request->keterangan;
        $statuslunas = $request->statuslunas;
        $kasir = $request->kasir;
        $pembangunan = $request->pembangunan;

        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->jenis_pengeluaran_id = $jenispengeluaran;
        $pengeluaran->tanggal = $tanggal;
        $pengeluaran->nominal = $nominal;
        $pengeluaran->keterangan = $keterangan;
        $pengeluaran->status_lunas = $statuslunas;
        $pengeluaran->kasir_id = $kasir;
        $pengeluaran->pembangunan_id = $pembangunan;

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
    
    public function laporanpengeluaran()
    {
        $pengeluaran = Pengeluaran::where('hapuskah', 0)->get();
        $jenispengeluaran = JenisPengeluaran::where('hapuskah', 0)->get();
        $kasir = User::where('jabatan', 'Kasir')->get();
        $pembangunan = Pembangunan::where('tanggal_selesai','!=',null)->where('hapuskah',0)->get();
           
        return view('laporan.pengeluaranperusahaan',compact('pengeluaran','jenispengeluaran','kasir','pembangunan'));
    }

    public function laporanpengeluaranindex(Request $request)
    {
        $tglawal = $request->tanggalawal;
        $tglakhir = $request->tanggalakhir;
        $pembangunan = $request->nomor;

        $tanggalawal = Pengeluaran::changeDateFormat($tglawal);
        $tanggalakhir = Pengeluaran::changeDateFormat($tglakhir);

        $pengeluaran = Pengeluaran::where('pembangunan_id','=',$pembangunan)->where('tanggal','>=',$tanggalawal)->where('tanggal','<=',$tanggalakhir)->get();
        

        return view('laporan.tabelpengeluaranperusahaan',compact('pengeluaran','pembangunan'));
    }

}
