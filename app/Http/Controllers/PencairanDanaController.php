<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PencairanDana;
use Illuminate\Support\Facades\Session;

class PencairanDanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pencairandana = PencairanDana::where('hapuskah', 0)->get();

        return view('master.pencairandana', compact('pencairandana'));
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
        $tanggal = $request->tanggal;
        $nomorbukti = $request->nomorbukti;
        $pemberi = $request->pemberi;
        $penerima = $request->penerima;

        PencairanDana::create([
            'tanggal_cair_dana' => $tanggal,
            'nomor_bukti' => $nomorbukti,
            'pemberi' => $pemberi,
            'penerima' => $penerima,
            'hapuskah' => 0
        ]);
        Session::flash('flash_msg', 'Data Pencairan Dana Berhasil Disimpan');
        return redirect('pencairandana');

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
        $pencairandana = PencairanDana::find($id);
        return response()->json([
            'id' => $id,
            'tanggal' => $pencairandana->tanggal_cair_dana,
            'nomorbukti' => $pencairandana->nomor_bukti,
            'pemberi' => $pencairandana->pemberi,
            'penerima' => $pencairandana->penerima
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
        $id = $request->pencairandana;
        $tanggal = $request->tanggal;
        $nomorbukti = $request->nomorbukti;
        $pemberi = $request->pemberi;
        $penerima = $request->penerima;

        $pencairandana = PencairanDana::find($id);

        $pencairandana->tanggal_cair_dana = $tanggal;
        $pencairandana->nomor_bukti = $nomorbukti;
        $pencairandana->pemberi = $pemberi;
        $pencairandana->penerima = $penerima;
        $pencairandana->save();

        Session::flash('flash_msg', 'Data Pencairan Dana Berhasil Diubah');
        return redirect('pencairandana');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->pencairandana;
        $pencairandana = PencairanDana::find($id);
        $pencairandana->hapuskah = 1;
        $pencairandana->save();

        Session::flash('flash_msg', 'Data Pencairan Dana Berhasil Dihapus');
        return redirect('pencairandana');
    }
}
