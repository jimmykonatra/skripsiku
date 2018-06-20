<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cicilan;
use App\Tipe;
use App\Bank;
use Illuminate\Support\Facades\Session;

class CicilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cicilan = Cicilan::where('hapuskah',0)->get();
        $tipe = Tipe::where('hapuskah',0)->get();
        $bank = Bank::where('hapuskah',0)->get();
        return view('master.cicilan',compact('cicilan','tipe','bank'));

        
   
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
        $tipe = $request->tipe;
        $bank = $request->bank;
        $lamacicilan = $request->lamacicilan;
        $nominal = $request->nominal;

        // Cicilan::create([
        //     'lama_cicilan' => $lamacicilan,
        //     'nominal' => $nominal,
        //     'tipe_id' => $tipe,
        //     'bank_id' => $bank,
        //     'hapuskah' => 0
        // ]);

        $cicilan = Cicilan::firstOrCreate(
            ['tipe_id' => $tipe, 'bank_id' => $bank, 'nominal' => $nominal, 'lama_cicilan' => $lamacicilan],['hapuskah' => 0]
        );
        if($cicilan->wasRecentlyCreated)
        {
            Session::flash('flash_msg', 'Data Cicilan Berhasil Disimpan');
        }
        else {
            Session::flash('error_msg', 'Data Cicilan Sudah Ada');
        }
        
        return redirect('cicilan');
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
        $cicilan = Cicilan::find($id);
        return response()->json([
            'id' => $id,
            'tipe' => $cicilan->tipe_id,
            'bank' => $cicilan->bank_id,
            'lamacicilan' => $cicilan->lama_cicilan,
            'nominal' => $cicilan->nominal
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
        $id = $request->cicilan;
        $tipe = $request->tipe;
        $bank = $request->bank;
        $lamacicilan = $request->lamacicilan;
        $nominal = $request->nominal;

        $cicilan = Cicilan::find($id);

        $cicilan->tipe_id = $tipe;
        $cicilan->bank_id = $bank;
        $cicilan->lama_cicilan = $lamacicilan;
        $cicilan->nominal = $nominal;

        $cicilan->save();

        Session::flash('flash_msg', 'Data Cicilan Berhasil Disimpan');
        return redirect('cicilan');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cicilan = Cicilan::find($request->cicilan);
        $cicilan->hapuskah = 1;
        $cicilan->save();

        Session::flash('flash_msg', 'Data Cicilan Berhasil Dihapus');
        return redirect('cicilan');
    }
}
