<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JualRumah;
use App\User;
use App\TandaTerima;
use Illuminate\Support\Facades\Session;


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
        $bookingfee = $request->bookingfee;
        $danakpr = $request->danakpr;
        $angsuran = $request->angsuran;
        $uangtambahan = $request->uangtambahan;
        $keterangan = $request->keterangan;
        $kasir = $request->kasir;
        $total = $bookingfee + $danakpr + $angsuran + $uangtambahan;

      
        $rumah = JualRumah::join('rumahs', 'jual_rumahs.rumah_id', '=', 'rumahs.id')
            ->join('tipes','rumahs.tipe_id','=','tipes.id')
            ->where('jual_rumahs.id', $nomornota)
            ->first();
        
        TandaTerima::Create([
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
        $tandaterima = TandaTerima::where('jual_rumah_id',$nomornota)->get();
        $totaluangmuka = 0;

        foreach($tandaterima as $data)
        {
            $totaluangmuka += $data->angsuran;
        }
        
        if($totaluangmuka >= $rumah->uang_muka)
        {
            $jualrumah = JualRumah::find($nomornota);
            $jualrumah->status_jual_rumah = 'Jadi';
            $jualrumah->save();

        }
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
        $tandaterima = Tandaterima::find($request->tandaterima);
        $tandaterima->hapuskah = 1;
        $tandaterima->save();

        Session::flash('flash_msg', 'Data Tanda Terima Berhasil Dihapus');
        return redirect('tandaterima');
    }
}
