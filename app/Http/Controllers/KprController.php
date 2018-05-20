<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kpr;
use App\Bank;
use App\JualRumah;
use App\User;
use Illuminate\Support\Facades\Session;


class KprController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kpr = KPR::where('hapuskah',0)->get();
        $bank = Bank::where('hapuskah',0)->get();
        $jualrumah = JualRumah::where('hapuskah',0)->get();
        $kasir = User::where('jabatan','Kasir')->get();
        
        return view ('master.kpr', compact('kpr','bank','jualrumah','kasir'));
    }

    public function updatetanggalakadkreditindex()
    {
        $kpr = KPR::where('hapuskah', 0)->get();
        $bank = Bank::where('hapuskah', 0)->get();
        $jualrumah = JualRumah::where('hapuskah', 0)->get();
        $kasir = User::where('jabatan', 'Kasir')->get();

        return view('kpr.updatetanggalakadkredit', compact('kpr', 'bank', 'jualrumah', 'kasir'));
    }

    public function updatetanggalcairindex()
    {
        $kpr = KPR::where('hapuskah', 0)->get();
        $bank = Bank::where('hapuskah', 0)->get();
        $jualrumah = JualRumah::where('hapuskah', 0)->get();
        $kasir = User::where('jabatan', 'Kasir')->get();

        return view('kpr.updatetanggalcair', compact('kpr', 'bank', 'jualrumah', 'kasir'));
    }

     public function updatetanggalserahterimasertifikatindex()
    {
        $kpr = KPR::where('hapuskah', 0)->get();
        $bank = Bank::where('hapuskah', 0)->get();
        $jualrumah = JualRumah::where('hapuskah', 0)->get();
        $kasir = User::where('jabatan', 'Kasir')->get();

        return view('kpr.updatetanggalserahterimasertifikat', compact('kpr', 'bank', 'jualrumah', 'kasir'));
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
        //
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
        

    }

    public function updatetanggalcairedit(Request $request)
    {
        $id = $request->id;

        $kpr = Kpr::find($id);
        return response()->json([
            'id' => $id,
            'tanggalcair' => $kpr->tanggal_cair,
            'tanggalakadkredit' => $kpr->tanggal_akad_kredit,
            'tanggalserahterimasertifikat' => $kpr->tanggal_serah_terima_sertifikat,
            'pemberi' => $kpr->pemberi,
            'penerima' => $kpr->penerima,
            'bank' => $kpr->bank_id,
            'jualrumah' => $kpr->jual_rumah_id,
            'kasir' => $kpr->kasir_id
        ]);
    }

    public function updatetanggalakadkreditedit(Request $request)
    {
        $id = $request->id;

        $kpr = Kpr::find($id);
        return response()->json([
            'id' => $id,
            'tanggalcair' => $kpr->tanggal_cair,
            'tanggalakadkredit' => $kpr->tanggal_akad_kredit,
            'tanggalserahterimasertifikat' => $kpr->tanggal_serah_terima_sertifikat,
            'pemberi' => $kpr->pemberi,
            'penerima' => $kpr->penerima,
            'bank' => $kpr->bank_id,
            'jualrumah' => $kpr->jual_rumah_id,
            'kasir' => $kpr->kasir_id
        ]);

    }

    public function updatetanggalserahterimasertifikatedit(Request $request)
    {
        $id = $request->id;

        $kpr = Kpr::find($id);
        return response()->json([
            'id' => $id,
            'tanggalcair' => $kpr->tanggal_cair,
            'tanggalakadkredit' => $kpr->tanggal_akad_kredit,
            'tanggalserahterimasertifikat' => $kpr->tanggal_serah_terima_sertifikat,
            'pemberi' => $kpr->pemberi,
            'penerima' => $kpr->penerima,
            'bank' => $kpr->bank_id,
            'jualrumah' => $kpr->jual_rumah_id,
            'kasir' => $kpr->kasir_id
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
        
    }

    public function updatetanggalcairupdate(Request $request)
    {
        $id = $request->updatetanggalcair;
        $tanggalcair = $request->tanggalcair;

        $kpr = Kpr::find($id);

        $kpr->tanggal_cair = $tanggalcair;

        $kpr->save();
        Session::flash('flash_msg', 'Data Tanggal Cair Berhasil Diubah');
        return redirect('updatetanggalcair');
    }

    public function updatetanggalakadkreditupdate(Request $request)
    {
        $id = $request->updatetanggalakadkredit;
        $tanggalakadkredit = $request->tanggalakadkredit;

        $kpr = Kpr::find($id);

        $kpr->tanggal_akad_kredit = $tanggalakadkredit;

        $kpr->save();
        Session::flash('flash_msg', 'Data Tanggal Akad Kredit Berhasil Diubah');
        return redirect('updatetanggalakadkredit');
    }

    public function updatetanggalserahterimasertifikatupdate(Request $request)
    {
        $id = $request->updatetanggalserahterimasertifikat;
        $tanggalserahterimasertifikat = $request->tanggalserahterimasertifikat;

        $kpr = Kpr::find($id);

        $kpr->tanggal_serah_terima_sertifikat = $tanggalserahterimasertifikat;

        $kpr->save();
        Session::flash('flash_msg', 'Data Tanggal Serah Terima Sertifikat Berhasil Diubah');
        return redirect('updatetanggalserahterimasertifikat');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kpr = Kpr::find($request->kpr);
        $kpr->hapuskah = 1;
        $kpr->save();

        Session::flash('flash_msg', 'Data KPR Berhasil Dihapus');
        return redirect('kpr');
    }
}
