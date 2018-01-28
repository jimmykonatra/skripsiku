<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisPengeluaran;
use Illuminate\Support\Facades\Session;

class JenisPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenispengeluaran = JenisPengeluaran::where('hapuskah',0)->get();
        return view('master.jenispengeluaran', compact('jenispengeluaran'));
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
        $nama = $request->nama;

        JenisPengeluaran::create([
            'nama' => $nama,
            'hapuskah' => 0
        ]);
        Session::flash('flash_msg', 'Data Jenis Pengeluaran Berhasil Disimpan');
        return redirect('jenispengeluaran');

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
        $jenispengeluaran = JenisPengeluaran::find($id);
        return response()->json([
            'id' => $id,
            'nama' => $jenispengeluaran->nama
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
        $id = $request->jenispengeluaran;
        $nama = $request->nama;

        $jenispengeluaran = JenisPengeluaran::find($id);

        $jenispengeluaran->nama = $nama;
        $jenispengeluaran->save();

        Session::flash('flash_msg', 'Data Jenis Pengeluaran Berhasil Diubah');
        return redirect('jenispengeluaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $jenispengeluaran = JenisPengeluaran::find($request->jenispengeluaran);
        $jenispengeluaran->hapuskah = 1;
        $jenispengeluaran->save();
        return redirect('jenispengeluaran');
    }   
}
