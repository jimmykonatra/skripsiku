<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JualRumah;
use App\User;
use App\TandaTerima;
use Illuminate\Support\Facades\Session;
use App\Rumah;
use App\Kpr;
use App\Customer;
use App\Perumahan;
use App\Tipe;
use Dompdf\Dompdf;

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
        $uangmuka = $request->uangmuka;
        $uangtambahan = $request->uangtambahan;
        $keterangan = $request->keterangan;
        $kasir = $request->kasir;
        $total = $bookingfee + $danakpr + $uangmuka + $uangtambahan;
        
        $bookingfeelunas = false;
        

        if($bookingfee > 0 && $bookingfee < 500000)
        {   
            return redirect('tandaterima')->with('error_msg','Booking Fee Minimal Rp 500.000');
        }
        
        if($bookingfee > 500000)
        {
            $uangmuka += $bookingfee - 500000;
            $bookingfee = 500000;
            $bookingfeelunas = true;
        }
       
        //setor tanda terima atau mulai input data tanda terima
        TandaTerima::Create([
            'tanggal' => $tglTerimaBaru,
            'booking_fee' => $bookingfee,
            'dana_kpr' => $danakpr,
            'uang_muka' => $uangmuka,
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
            $totaluangmuka += $data->uang_muka;
        }

        if($bookingfeelunas == true)
        {
            $jualrumah = JualRumah::find($nomornota);
            $jualrumah->status_jual_rumah = 'Proses KPR';
            $jualrumah->save();

            $rumah = Rumah::find($jualrumah->rumah_id);
            $rumah->status_booking = 'Terbooking';
            $rumah->save();
        }
        if($totaluangmuka >= $rumah->uang_muka)//jika DP telah lunas maka update status jual rumah
        {
            $jualrumah = JualRumah::find($nomornota);
            $jualrumah->status_dp = 'Lunas';
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
            'uangmuka' => $tandaterima->uang_muka,
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
    public function update(Request $request)
    {
        
        //request tanggal
        $tanggal = $request->tanggalUbah;
        //mengubah format sesuai MYSQL
        $tglTerimaBaru = TandaTerima::changeDateFormat($tanggal);
        $bookingfee = $request->bookingfee;
        $danakpr = $request->danakpr;
        $uangmuka = $request->uangmuka;
        $uangtambahan = $request->uangtambahan;
        $total = $request->total;
        $keterangan = $request->keterangan;
        $nomornota = $request->nomornota;
        $kasir = $request->kasir;
        $id = $request->tandaterima;
        
        $tandaterima = TandaTerima::find($id);

        $tandaterima->tanggal = $tglTerimaBaru;
        $tandaterima->booking_fee = $bookingfee;
        $tandaterima->dana_kpr = $danakpr;
        $tandaterima->uang_muka = $uangmuka;
        $tandaterima->uang_tambahan = $uangtambahan;
        $tandaterima->total = $total;
        $tandaterima->keterangan = $keterangan;
        $tandaterima->jual_rumah_id = $nomornota;
        $tandaterima->kasir_id = $kasir;
        
        $tandaterima->save();

        Session::flash('flash_msg', 'Data Tanda Terima Berhasil Diubah');
        return redirect('tandaterima');

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

    public function lihattotal(Request $request)
    {
        $nomornota = $request->nomornota;
        $tandaterima = TandaTerima::where('jual_rumah_id',$nomornota)->get();
        $rumah = JualRumah::where('id',$nomornota)->first();
        $tipe = Rumah::where('id',$rumah->rumah_id)->first();
        $uangmuka = Tipe::where('id',$tipe->tipe_id)->first();

        $jumlahuangmuka = $tandaterima->sum("uang_muka");

        return response()->json(array(
            'jumlahuangmuka' => number_format( $jumlahuangmuka, 0 , '' , '.' ),
            'uangmuka' => number_format( $uangmuka->uang_muka, 0 , '' , '.' )

        ));
    }

    public function print($id)
    {
        $tandaterima = TandaTerima::where('id',$id)->first();
        $jualrumah = JualRumah::where('id',$tandaterima->jual_rumah_id)->first();

        $customer = Customer::where('id',$jualrumah->customer_id)->first();
        $rumah = Rumah::where('id',$jualrumah->rumah_id)->first();
        $tipe = Tipe::where('id',$rumah->tipe_id)->first();
        $perumahan = Perumahan::where('id',$rumah->perumahan_id)->first();
        $kasir = User::where('id',$tandaterima->kasir_id)->first();
        
        $total = ucfirst(TandaTerima::kekata($tandaterima->total));
        $content = view('tandaterima.cetaktandaterima',compact('tandaterima','jualrumah','customer','rumah','tipe','perumahan','kasir','total'));

        $dompdf = new Dompdf();

        //PDF::SetFont('', '', 8);
        //PDF::AddPage();

        $dompdf->loadHtml($content);

        // (Optional) Setup the paper size and orientation
        //$dompdf->setPaper('A4', 'potrait');
        $dompdf->set_paper(array(0, 0, 595, 841), 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($tandaterima->id.".pdf", array("Attachment" => false));
    }
}
