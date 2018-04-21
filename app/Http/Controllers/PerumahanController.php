<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perumahan;
use Illuminate\Support\Facades\Session;

class PerumahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perumahan = Perumahan::where('hapuskah',0)->get();
        return view('master.perumahan', compact('perumahan'));
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
        $alamat = $request->alamat;
        $luas = $request->luas;

        Perumahan::Create([
            'nama' => $nama,
            'alamat' => $alamat,
            'luas' => $luas,
            'hapuskah' => 0
        ]);
        Session::flash('flash_msg', 'Data Perumahan Berhasil Disimpan');
        return redirect('perumahan');

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
        $perumahan = Perumahan::find($id);
        return response()->json([
            'id' => $id,
            'nama' => $perumahan->nama,
            'alamat' => $perumahan->alamat,
            'luas' => $perumahan->luas
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
        $id = $request->perumahan;
        $nama = $request->nama;
        $alamat = $request->alamat;
        $luas = $request->luas;

        $perumahan = Perumahan::find($id);

        $perumahan->nama = $nama;
        $perumahan->alamat = $alamat;
        $perumahan->luas = $luas;
        $perumahan->save();

        Session::flash('flash_msg', 'Data Perumahan Berhasil Diubah');
        return redirect('perumahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $perumahan = Perumahan::find($request->perumahan);
        $perumahan->hapuskah = 1;
        $perumahan->save();

        Session::flash('flash_msg', 'Data Perumahan Berhasil Dihapus');
        return redirect('perumahan');


    }
}
