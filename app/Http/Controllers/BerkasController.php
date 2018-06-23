<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berkas;
use Illuminate\Support\Facades\Session;

class BerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berkas = Berkas::where('hapuskah',0)->get();

        return view('master.berkas',compact('berkas'));
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

        // Berkas::create([
        //     'nama' => $nama,
        //     'hapuskah' => 0
        // ]);

        $berkas = Berkas::updateOrCreate(
            ['nama' => $nama],
            ['hapuskah' => 0]
        );

        if($berkas->wasRecentlyCreated)
        {
            Session::flash('flash_msg', 'Data Berkas Berhasil Disimpan');
        }
        else 
        {
            Session::flash('warning_msg', 'Data Bank Telah Terdaftar');
        }
        return redirect('berkas');
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
        $berkas = Berkas::find($id);
        return response()->json([
            'id' => $id,
            'nama' => $berkas->nama
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
        $id = $request->berkas;
        $nama = $request->nama;

        $berkas = Berkas::find($id);
        $berkas->nama = $nama;
        $berkas->save();

        Session::flash('flash_msg', 'Data Berkas Berhasil Diubah');
        return redirect('berkas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->berkas;
        $berkas = Berkas::find($id);
        $berkas->hapuskah = 1;
        $berkas->save();

        Session::flash('flash_msg', 'Data Berkas Berhasil Dihapus');
        return redirect('berkas');
    }
}
