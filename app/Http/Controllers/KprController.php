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
        $jualrumah = JualRumah::where('jenis_bayar','KPR')->where('status_jual_rumah','Proses KPR')->where('status_dp','Lunas')->where('hapuskah',0)->get();
        $kasir = User::where('jabatan','Kasir')->get();
        
        return view ('master.kpr', compact('kpr','bank','jualrumah','kasir'));
    }

    public function updatetanggalakadkreditindex()
    {
        $kpr = KPR::where('hapuskah', 0)->get();
        $bank = Bank::where('hapuskah', 0)->get();
        $jualrumah = JualRumah::where('status_jual_rumah', 'Proses KPR')->where('status_dp','Lunas')->where('hapuskah', 0)->get();
        $kasir = User::where('jabatan', 'Kasir')->get();

        return view('kpr.updatetanggalakadkredit', compact('kpr', 'bank', 'jualrumah', 'kasir'));
    }

    public function updatetanggalserahsertifikatnotarisindex()
    {
        $kpr = KPR::where('hapuskah', 0)->where('tanggal_akad_kredit','!=',null)->get();
        $bank = Bank::where('hapuskah', 0)->get();
        $jualrumah = JualRumah::where('status_jual_rumah', 'Proses KPR')->where('hapuskah', 0)->get();
        $kasir = User::where('jabatan', 'Kasir')->get();
     
        return view('kpr.updatetanggalserahsertifikatnotaris', compact('kpr', 'bank', 'jualrumah', 'kasir'));
    }

    public function updatetanggalcairindex()
    {
        $kpr = KPR::where('hapuskah', 0)->where('tanggal_akad_kredit','!=','null')->get();
        $bank = Bank::where('hapuskah', 0)->get();
        $jualrumah = JualRumah::where('status_jual_rumah', 'Proses KPR')->where('hapuskah', 0)->get();
        $kasir = User::where('jabatan', 'Kasir')->get();

        return view('kpr.updatetanggalcair', compact('kpr', 'bank', 'jualrumah', 'kasir'));
    }

    //  public function updatetanggalserahterimasertifikatindex()
    // {
    //     $kpr = KPR::where('hapuskah', 0)->where('tanggal_cair','!=','null')->where('tanggal_akad_kredit','!=','null')->get();
    //     $bank = Bank::where('hapuskah', 0)->get();
    //     $jualrumah = JualRumah::where('status_jual_rumah','Proses KPR')->where('hapuskah', 0)->get();
    //     $kasir = User::where('jabatan', 'Kasir')->get();

    //     return view('kpr.updatetanggalserahterimasertifikat', compact('kpr', 'bank', 'jualrumah', 'kasir'));
    // }
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
        $tanggalcair = $request->tanggalcair;
        $pemberi = $request->pemberi;
        $penerima = $request->penerima;
        $bank = $request->bank;
        $jualrumah = $request->jualrumah;
        $kasir = $request->kasir;

        // Kpr::create([
        //     'pemberi' => $pemberi,
        //     'penerima' => $penerima,
        //     'bank_id' => $bank,
        //     'jual_rumah_id' => $jualrumah,
        //     'kasir_id' => $kasir,
        //     'hapuskah' => 0 
        // ]);

        $kpr = Kpr::updateOrCreate(
            ['bank_id' => $bank, 
                'jual_rumah_id' => $jualrumah,
                'kasir_id' => $kasir,
            ],
            [
                
                'hapuskah' => 0
            ]
        );
        if($kpr->wasRecentlyCreated){
            Session::flash('flash_msg', 'Data KPR Berhasil Disimpan');
        }
        else {
            Session::flash('warning_msg', 'Data Kpr Telah Terdaftar');
        }
        return redirect('kpr');
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
        $kpr = Kpr::find($id);

        return response()->json([
            'jualrumah' => $kpr->jual_rumah_id,
            'bank' => $kpr->bank_id,
            'kasir' => $kpr->kasir_id 
        ]);

    }

    public function updatetanggalcairedit(Request $request)
    {
        $id = $request->id;

        $kpr = Kpr::find($id);
        return response()->json([
            'id' => $id,
            'tanggalcair' => $kpr->tanggal_cair,
            'tanggalakadkredit' => $kpr->tanggal_akad_kredit,
            
            'tanggalserahsertifikatnotaris' => $kpr->tanggal_serah_sertifikat_notaris,
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
            'tanggalserahsertifikatbank' => $kpr->tanggal_serah_sertifikat_notaris,
            'pemberi' => $kpr->pemberi,
            'penerima' => $kpr->penerima,
            'bank' => $kpr->bank_id,
            'jualrumah' => $kpr->jual_rumah_id,
            'kasir' => $kpr->kasir_id
        ]);

    }

    public function updatetanggalserahsertifikatnotarisedit(Request $request)
    {
        $id = $request->id;

        $kpr = Kpr::find($id);
        return response()->json([
            'id' => $id,
            'tanggalcair' => $kpr->tanggal_cair,
            'tanggalakadkredit' => $kpr->tanggal_akad_kredit,
            'tanggalserahsertifikatnotaris' => $kpr->tanggal_serah_sertifikat_notaris,
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
        $tglcair = $request->tanggalcair;
        $tanggalcair = Kpr::changeDateFormat($tglcair);

        $pemberi = $request->pemberi;
        $penerima = $request->penerima;

        $kpr = Kpr::find($id);
        $kpr->tanggal_cair = $tanggalcair;
        $kpr->pemberi = $pemberi;
        $kpr->penerima = $penerima;

        $nomorjualrumah = $request->jualrumah;
        $jualrumah = JualRumah::find($nomorjualrumah);
        $jualrumah->status_jual_rumah = 'Selesai';
        $jualrumah->save();

        $kpr->save();

        Session::flash('flash_msg', 'Data Tanggal Cair Berhasil Diubah');
        return redirect('updatetanggalcair');
    }

    public function updatetanggalakadkreditupdate(Request $request)
    {
        $id = $request->updatetanggalakadkredit;
        
        $tglakadkredit = $request->tanggalakadkredit;
        $tanggalakadkredit = Kpr::changeDateFormat($tglakadkredit);

        $kpr = Kpr::find($id);

        $kpr->tanggal_akad_kredit = $tanggalakadkredit;

        $kpr->save();
        Session::flash('flash_msg', 'Data Tanggal Akad Kredit Berhasil Diubah');
        return redirect('updatetanggalakadkredit');
    }

    public function updatetanggalserahsertifikatnotarisupdate(Request $request)
    {
        $id = $request->updatetanggalserahsertifikatnotaris;
        $tglserahsertifikatnotaris = $request->tanggalserahsertifikatnotaris;
        $tanggal = Kpr::changeDateFormat($tglserahsertifikatnotaris);

        $kpr = Kpr::find($id);

        $kpr->tanggal_serah_sertifikat_notaris = $tanggal;
        $kpr->save();

        Session::flash('flash_msg', 'Data Tanggal Serah Terima Sertifikat Ke Notaris Berhasil Diubah');
        return redirect('updatetanggalserahsertifikatnotaris');
    }

    // public function updatetanggalserahterimasertifikatupdate(Request $request)
    // {   
    //     $id = $request->updatetanggalserahterimasertifikat;
    //     $tgl = $request->tanggalserahterimasertifikat;
    //     $tanggal = Kpr::changeDateFormat($tgl);

    //     $kpr = Kpr::find($id);

    //     
        
    //     $kpr->save();

       
       
   
    //     // $jualrumah = JualRumah::find($nomorjualrumah);
    //     // dd($jualrumah);

    //     // $jualrumah->status_jual_rumah = 'Selesai';
    //     // $jualrumah->save();
        
        
    //     Session::flash('flash_msg', 'Data Tanggal Serah Terima Sertifikat Berhasil Diubah');
    //     return redirect('updatetanggalserahterimasertifikat');
    // }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        $id = $request->kpr;

        $kpr = Kpr::find($id);
        $kpr->hapuskah = 1;
        $kpr->save();

        Session::flash('flash_msg', 'Data KPR Berhasil Dihapus');
        return redirect('kpr');
    }
}
