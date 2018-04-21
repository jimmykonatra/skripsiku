<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rumah;
use App\Perumahan;
use App\Tipe;
use DB;
use Illuminate\Support\Facades\Session;

class RumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rumah = Rumah::where('hapuskah',0)->get();
        $perumahan = Perumahan::where('hapuskah',0)->get();
        $tipe = Tipe::where('hapuskah',0)->get();

        return view('master.rumah', compact('rumah', 'perumahan', 'tipe'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perumahan = $request->perumahan;
        $tipe = $request->tipe;
        $nomor = $request->nomor;
        $tahun = $request->tahun;
        $statuspembangunan = $request->statuspembangunan;
        $statusbooking = $request->statusbooking;
        $statusterjual = $request->statusterjual;
        $keterangan = $request->keterangan;

        Rumah::create([
            'perumahan_id' => $perumahan,
            'tipe_id' => $tipe,
            'nomor' => $nomor,
            'tahun' => $tahun,
            'status_pembangunan' => $statuspembangunan,
            'status_booking' => $statusbooking,
            'status_terjual' => $statusterjual,
            'keterangan' => $keterangan,
            'hapuskah' => 0
        ]);

        Session::flash('flash_msg', 'Data Rumah Berhasil Disimpan');
        return redirect('rumah');
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

        $rumah = Rumah::find($id);
        return response()->json([
            'id' => $id,
            'nomor' => $rumah->nomor,
            'tahun' => $rumah->tahun,
            'statuspembangunan' => $rumah->status_pembangunan,
            'statusbooking' => $rumah->status_booking,
            'statusterjual' => $rumah->status_terjual,
            'keterangan' => $rumah->keterangan,
            'perumahan' => $rumah->perumahan_id,
            'tipe' => $rumah->tipe_id
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
        $id = $request->rumah;
        $perumahan = $request->perumahan;
        $tipe = $request->tipe;
        $nomor = $request->nomor;
        $tahun = $request->tahun;
        $statuspembangunan = $request->statuspembangunan;
        $statusbooking = $request->statusbooking;
        $statusterjual = $request->statusterjual;
        $keterangan = $request->keterangan;

        $rumah = Rumah::find($id);

        $rumah->nomor = $nomor;
        $rumah->tahun = $tahun;
        $rumah->status_pembangunan = $statuspembangunan;
        $rumah->status_booking = $statusbooking;
        $rumah->status_terjual = $statusterjual;
        $rumah->keterangan = $keterangan;
        $rumah->perumahan_id = $perumahan;
        $rumah->tipe_id = $tipe;

        $rumah->save();

        Session::flash('flash_msg', 'Data Rumah Berhasil Disimpan');
        return redirect('rumah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $rumah = Rumah::find($request->rumah);
        $rumah->hapuskah = 1;
        $rumah->save();

        Session::flash('flash_msg', 'Data Rumah Berhasil Dihapus');
        return redirect('rumah');
    }
}
