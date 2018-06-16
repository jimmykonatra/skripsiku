<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JualRumah;
use App\User;
use App\TandaTerima;
use Illuminate\Support\Facades\Session;
use App\Rumah;


class TandaTerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tandaterima = TandaTerima::where('hapuskah',0)->get();
        $kasir = User::where('jabatan','Kasir')->get();
        $jualrumah = JualRumah::where('hapuskah',0)->get();

        return view('master.tandaterima',compact('tandaterima','kasir','jualrumah'));
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
        $nomornota = $request->nomornota;
        $tanggal = $request->tanggal;
        $tglTerimaBaru = TandaTerima::changeDateFormat($tanggal);
        
        $bookingfee = $request->bookingfee;
        $danakpr = $request->danakpr;
        $angsuran = $request->angsuran;
        $uangtambahan = $request->uangtambahan;
        $keterangan = $request->keterangan;
        $kasir = $request->kasir;
        $total = $bookingfee + $danakpr + $angsuran + $uangtambahan;
        
      
       
        //setor tanda terima atau mulai input data tanda terima
        TandaTerima::Create([
            'tanggal' => $tglTerimaBaru,
            'booking_fee' => $bookingfee,
            'dana_kpr' => $danakpr,
            'angsuran' => $angsuran,
            'uang_tambahan' => $uangtambahan,
            'total' => $total,
            'keterangan' => $keterangan,
            'jual_rumah_id' => $nomornota,
            'kasir_id' => $kasir,
            'hapuskah' => 0
        ]);

        //ambil data rumah pada nomor nota berikut
        $rumah = JualRumah::join('rumahs', 'jual_rumahs.rumah_id', '=', 'rumahs.id')
            ->join('tipes', 'rumahs.tipe_id', '=', 'tipes.id')
            ->where('jual_rumahs.id', $nomornota)
            ->first();
        
        $tandaterima = TandaTerima::where('jual_rumah_id',$nomornota)->get();
        $totaluangmuka = 0;

        foreach($tandaterima as $data)
        {
            $totaluangmuka += $data->angsuran;
        }

        if($totaluangmuka >= $rumah->uang_muka)//jika DP telah lunas maka update status jual rumah
        {
            $jualrumah = JualRumah::find($nomornota);
            $jualrumah->status_jual_rumah = 'Proses KPR';
            $jualrumah->save();

            $rumah = Rumah::find($jualrumah->rumah_id);
            $rumah->status_booking = 'Terbooking';
            $rumah->save();
        }
        else
        {
            $jualrumah = JualRumah::find($nomornota);
            $jualrumah->status_jual_rumah = 'Proses DP';
            $jualrumah->save();
            
        }
        //update status booking rumah
        Session::flash('flash_msg', 'Data Tanda Terima Berhasil Disimpan');
        return redirect('tandaterima');
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

        $tandaterima = TandaTerima::find($id);

        return response()->json([
            'tanggal' => $tandaterima->tanggal,
            'bookingfee' => $tandaterima->booking_fee,
            'danakpr' => $tandaterima->dana_kpr,
            'angsuran' => $tandaterima->angsuran,
            'uangtambahan' => $tandaterima->uang_tambahan,
            'total' => $tandaterima->total,
            'keterangan' => $tandaterima->keterangan,
            'nomornota' => $tandaterima->jual_rumah_id,
            'kasir' => $tandaterima->kasir_id
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
        $tandaterima = Tandaterima::find($request->tandaterima);
        $tandaterima->hapuskah = 1;
        $tandaterima->save();

        Session::flash('flash_msg', 'Data Tanda Terima Berhasil Dihapus');
        return redirect('tandaterima');
    }
}
