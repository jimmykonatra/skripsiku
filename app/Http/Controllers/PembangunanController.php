<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rumah;
use App\Pembangunan;
use DB;
use Illuminate\Support\Facades\Session;

class PembangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembangunan = Pembangunan::where('hapuskah',0)->get();
        $rumah = Rumah::where('hapuskah',0)->where('status_pembangunan','Belum Dibangun')->get();
        
        return view('master.pembangunan',compact('pembangunan','rumah'));
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
        $id = $request->pembangunan;
        $all = $request->all();

        $nomor = $request->nomor;
        $rumah = $request->rumah;
        $tglmulai = $request->tanggalmulai;
        $tanggalmulai = Pembangunan::changeDateFormat($tglmulai);

        $tglselesai = $request->tanggalselesai;
        if($tglselesai == ""){
            $tanggalselesai = null;
        }
        else {

            $tanggalselesai = Pembangunan::changeDateFormat($tglselesai);
        }
        $lamapembangunan = $request->lamapembangunan;
        $penanggungjawab = $request->penanggungjawab;
        
        // $pembangunan = Pembangunan::Create(
        //     [
        //     ]);

        foreach ($rumah as $data) {
            DB::table('pembangunans')->insert([
                'nomor' => $nomor,
                'rumah_id' => $data,
                'tanggal_mulai' => $tanggalmulai,
                'tanggal_selesai' => $tanggalselesai,
                'lama_pembangunan' => $lamapembangunan,
                'penanggungjawab' => $penanggungjawab,
                'hapuskah' => 0
            ]);

                $updateRumah = Rumah::find($data);
                $updateRumah->status_pembangunan = 'Proses Pembangunan';
                $updateRumah->save();          
        }
        Session::flash('flash_msg','Data Pembangunan Berhasil Disimpan');
        return redirect('pembangunan');
        
    }
    public function selesai(Request $request)
    {

        $id = $request->pembangunan;
        $pembangunan = Pembangunan::find($id);
        // $pembangunan->tanggal_selesai = date('Y-m-d');
        // $pembangunan->save();

        $get = Pembangunan::where('nomor',$pembangunan->nomor)->get();
        foreach($get as $data){

            $updatepembangunan = Pembangunan::find($data->id);
            $updatepembangunan->tanggal_selesai = date('Y-m-d');
            $updatepembangunan->save();

        $ambilRumah = $data->rumah_id;
        $rumah = Rumah::find($ambilRumah);
        $rumah->status_pembangunan = "Selesai Pembangunan";
        $rumah->save();
        }

        Session::flash('flash_msg','Data Selesai Pembangunan Tersimpan');
        return redirect('pembangunan');
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
    public function edit($id)
    {
        //
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
    public function destroy(Request $request)
    {
        $id = $request->pembangunan;
        $pembangunan = Pembangunan::find($id);
        $pembangunan->hapuskah = 1;
        $pembangunan->save();

        Session::flash('flash_msg','Data Pembangunan Berhasil Dihapus');
        return redirect('pembangunan');
    }
}
