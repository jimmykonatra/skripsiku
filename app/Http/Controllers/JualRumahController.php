<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Customer;
use App\User;
use App\Rumah;
use App\Nota;
use App\Tipe;
use App\Berkas;
use App\Karyawan;
use App\JualRumah; 
use App\PencairanDana;
use App\TandaTerima;
use PDF;
use Dompdf\Dompdf;

use Illuminate\Support\Facades\DB;

class JualRumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jualrumah = JualRumah::where('hapuskah',0)->get();
        $customer = Customer::where('hapuskah',0)->get();
        $marketing = User::where('jabatan','Marketing')->get();
        $kasir = User::where('jabatan','Kasir')->get();
        // $rumah = Rumah::where('status_pembangunan','Belum Dibangun')->orWhere('status_pembangunan','Proses Pembangunan')->orWhere('status_pembangunan','Selesai Pembangunan')->where('hapuskah', 0)->get();
        $rumah = Rumah::where('hapuskah',0)->get();
        return view('jualrumah.jualrumah' , compact('jualrumah','customer','marketing','kasir','rumah'));
    }

    // public function updatetanggalcairdanaindex()
    // {
    //     $jualrumah = JualRumah::where('hapuskah',0)->get();
    //     $customer = Customer::where('hapuskah',0)->get();
    //     $marketing = User::where('jabatan','Marketing')->get();
    //     $kasir = User::where('jabatan','Kasir')->get();
    //     $rumah = Rumah::where('hapuskah',0)->get();
    //     $pencairandana = PencairanDana::where('hapuskah',0)->get();
        
    //     return view('jualrumah.updatetanggalcairdana' , compact('jualrumah','customer','marketing','kasir','rumah','pencairandana'));
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function create()
    {
        $customer = Customer::where('hapuskah','0')->get();
        $rumah = Rumah::where('status_booking','Kosong')
                    ->where('status_terjual','Belum Terjual')
                    ->where('hapuskah', '0')
                    ->get();    
        $berkas = Berkas::where('hapuskah','0')->get();
        $marketing = User::join('karyawans','users.id','=','karyawans.user_id')->where([['jabatan','Marketing'],['karyawans.hapuskah',0]])->get();
        $kasir = User::join('karyawans','users.id','=','karyawans.user_id')->where([['jabatan', 'Kasir'], ['karyawans.hapuskah', 0]])->get();
        return view('jualrumah.buatjualrumah', compact('customer','rumah','berkas','marketing','kasir'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = $request->customer;
        $nomornota = $request->nomornota;
        
        $rumah = $request->rumah;
        $tanggalbuat = $request->ambiltanggalbuat;
        $tanggaldp = $request->tanggaldp;
        $berkas = $request->berkas;
        $keterangan = $request->keterangan;
        $jenisbayar = $request->jenisbayar;
        //untuk ambil jumlah total semua berkas yang ada di database
        $jumlahberkas = Berkas::all()->count(); 
        $marketing = $request->marketing;
        $kasir = $request->kasir;
       

                
        if(count($berkas) == $jumlahberkas)
        {
            $lengkap = 'Lengkap';
        } else {
           
            $lengkap = "Tidak Lengkap";
        }
        $total = Rumah::join('tipes','rumahs.tipe_id','=','tipes.id')
                ->where('rumahs.id','=',$rumah)
                ->first();


        $inputnota = JualRumah::create([
            'nomor_nota' => $nomornota,
            'tanggal_buat' => $tanggalbuat,
            'total' => $total->harga_jual,
            'tanggal_dp' => $tanggaldp,
            'status_kelengkapan' => $lengkap,
            'keterangan' => $keterangan,
            'jenis_bayar' => $jenisbayar,
            'status_jual_rumah' => 'Batal',
            'customer_id' => $customer,
            'marketing_id' => $marketing,
            'kasir_id' => $kasir,
            'rumah_id' => $rumah,
            'hapuskah' => 0
        ]);

        $dataRumah = Rumah::where('id', '=', $rumah)->first();
        $dataRumah->status_terjual = 'Terjual';
        $dataRumah->status_booking = 'Terbooking';
        $dataRumah->save(); 

        foreach ($berkas as $data) {
            DB::table('berkas_jual_rumah')->insert([
                'jual_rumah_id' => $inputnota->id,
                'berkas_id' => $data,
                'tanggal_terima' => $tanggalbuat,
                'tanggal_kembali' => null,
                'hapuskah' => 0
            ]);
        }
        Session::flash('flash_msg', 'Data Jual Rumah Berhasil Disimpan');
        return redirect('jualrumah');
     
            
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
        $jualrumah = JualRumah::find($id);
        $customer = Customer::all();
        $rumah = Rumah::all();
        $berkas = Berkas::all();


        $marketing = User::join('karyawans', 'users.id', '=', 'karyawans.user_id')->where([['jabatan', 'Marketing'], ['karyawans.hapuskah', 0]])->get();
        $kasir = User::join('karyawans', 'users.id', '=', 'karyawans.user_id')->where([['jabatan', 'Kasir'], ['karyawans.hapuskah', 0]])->get();
        
        $cekberkas = DB::table('berkas_jual_rumah')->where('jual_rumah_id','=',$id)->get();

        
        return view('jualrumah.ubahjualrumah', compact('jualrumah','cekberkas','customer', 'rumah', 'berkas', 'marketing', 'kasir')); 
        
    }

    public function updatetanggalcairdanaedit()
    {

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
        $id = $request->jualrumah;
        $customer = $request->customer;
        $nomornota = $request->nomornota;
        $total = $request->total;
        $rumah = $request->rumah;
        $marketing = $request->marketing;
        $kasir = $request->kasir;
        $tanggalbuat = $request->tanggalbuat;
        $tanggaldp = $request->tanggaldp;
        $berkas = $request->berkas;
        $keterangan = $request->keterangan;
        $jumlahberkas = Berkas::all()->count();

        $jualrumah = JualRumah::find($id);

        $jualrumah->nomor_nota = $nomornota;
        $jualrumah->tanggal_dp = $tanggaldp;
        $jualrumah->tanggal_buat = $tanggalbuat;
        $jualrumah->total = $total;
        $jualrumah->keterangan = $keterangan;
        $jualrumah->customer_id = $customer;
        $jualrumah->rumah_id = $rumah;
        $jualrumah->marketing_id = $marketing;
        $jualrumah->kasir_id = $kasir;
        

        foreach ($berkas as $data) {
            $kelengkapanberkas = DB::table('berkas_jual_rumah')
                            ->where('jual_rumah_id',$id)
                            ->where('berkas_id',$data)
                            ->first();
            if($kelengkapanberkas == null){
                DB::table('berkas_jual_rumah')->insert([
                    'jual_rumah_id' => $id,
                    'berkas_id' => $data,
                    'tanggal_terima' => date("Y-m-d"),
                    'tanggal_kembali' => null,
                    'hapuskah' => 0
                ]);    
            }
            
        }

        if (count($berkas) == $jumlahberkas) {
            $lengkap = 'Lengkap';
        } else {

            $lengkap = "Tidak Lengkap";
        }
        $jualrumah->status_kelengkapan = $lengkap;
        $jualrumah->save();

        Session::flash('flash_msg', 'Data Jual Rumah Berhasil Diubah');
        return redirect('jualrumah');

    }

    public function updatetanggalcairdanaupdate(Request $request)
    {

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $jualrumah = JualRumah::find($request->jualrumah);
        $jualrumah->hapuskah = 1;
        $jualrumah->save();

        Session::flash('flash_msg', 'Data Jual Rumah Berhasil Dihapus');
        return redirect('jualrumah');
    }

    public function print($id)
    {
        $jualrumah = JualRumah::where('hapuskah', 0)->where('id','=',$id)->first();
        $customer = Customer::where('hapuskah', 0)->where('id','=',$jualrumah->customer_id)->first();
        $marketing = User::where('jabatan', 'Marketing')->where('id','=',$jualrumah->marketing_id)->first();
        $kasir = User::where('jabatan', 'Kasir')->where('id', '=', $jualrumah->kasir_id)->first();
        $rumah = Rumah::where('hapuskah', 0)->where('id','=',$jualrumah->rumah_id)->first();
        // $tipe = Tipe::where('hapuskah',0)->where('id','=',$jualrumah->tipe_id)->first();
        $tandaterimabookingfee = TandaTerima::where('hapuskah',0)
                        ->where('jual_rumah_id','=',$jualrumah->id)
                        ->where('booking_fee','!=',0)
                        ->get();
                $cetakbookingfee = "";
                foreach($tandaterimabookingfee as $bookingfee)
                {
                    $cetakbookingfee.= '<tr>
                <td>Tanda Jadi / Booking Fee</td>
                <td>'.$bookingfee->tanggal.'</td>
                <td>Rp '.$bookingfee->booking_fee.'</td>
                </tr>';
                }
        $tandaterimadanakpr = TandaTerima::where('hapuskah', 0)
                        ->where('jual_rumah_id', '=', $jualrumah->id)
                        ->where('dana_kpr','!=',0)
                        ->get();
                        $cetakdanakpr = "";
        foreach ($tandaterimadanakpr as $danakpr) {
            $cetakdanakpr.= '<tr>
                <td>Dana KPR</td>
                <td>' . $danakpr->tanggal . '</td>
                <td>Rp ' . $danakpr->dana_kpr . '</td>
                </tr>';
        }
        $tandaterimaangsuran = TandaTerima::where('hapuskah', 0)
                        ->where('jual_rumah_id', '=', $jualrumah->id)
                        ->where('angsuran','!=',0)
                        ->get();
                        $cetakangsuran="";
        foreach ($tandaterimaangsuran as $angsuran) {
            $cetakangsuran.= '<tr>
                <td>Angsuran</td>
                <td>' . $angsuran->tanggal . '</td>
                <td>Rp ' . $angsuran->angsuran . '</td>
                </tr>';
        }
        $tandaterimauangtambahan = TandaTerima::where('hapuskah', 0)
                        ->where('jual_rumah_id', '=', $jualrumah->id)
                        ->where('uang_tambahan','!=',0)
                        ->get();
                        $cetakuangtambahan = "";
        foreach ($tandaterimauangtambahan as $uangtambahan) {
            $cetakuangtambahan.= '<tr>
                <td>Uang Tambahan</td>
                <td>' . $uangtambahan->tanggal . '</td>
                <td>Rp ' . $uangtambahan->uang_tambahan . '</td>
                </tr>';
        }

        $content = '<html>
                    <head>
                        <style>
                            table.tabel_normal {
                                border-collapse: collapse;
                                text-align:center;  
                                border:1px;
                            }
                            table {
                                width:100%;
                            }
                            body {
                                 font-family: Times New Roman;
                                 font-size:12px"
                            }
                        </style>
                    </head>
                    <body>
                        <h2 style="text-align:center">NOTA JUAL RUMAH</h2>
                        <p><b>Yang bertanda tangan dibawah ini:</b></p>
                        <table>
                        <tr>
                            <td style="padding-left:40px">Nama</td>
                            <td colspan="2">:'. $customer->nama .'</td>
                            
                        </tr>
                        <tr>
                            <td style="padding-left:40px">Alamat</td>
                            <td>:'.$customer->alamat.'</td>
                            
                        </tr>
                        <tr>
                            <td style="padding-left:40px">Nomor Telepon</td>
                            <td>:'.$customer->no_telepon.'</td>
                            
                        </tr>
                        <tr>
                            <td style="padding-left:40px">Pekerjaan</td>
                            <td>:'.$customer->pekerjaan.'</td>
                            
                        </tr>
                         <tr>
                            <td style="padding-left:40px">Nomor KTP</td>
                            <td>:'.$customer->no_ktp.' </td>
                            
                        </tr>
                    </table>
        <br>
        <p><b>Dengan ini menyatakan setuju memesan untuk membeli sebuah bangunan rumah berikut tanahnya di PT. SUMBER LANGGENG SEJAHTERA dengan ketentuan - ketentuan sebagai berikut: </b></p>
    
        <table>
                        <tr>
                            <td style="padding-left:20px">Tipe Rumah</td>
                            <td colspan="4">:'.$rumah->tipe->nama.' </td>
                            <td style="padding-left:20px">Luas Bangunan</td>
                            <td colspan="4">:'.$rumah->tipe->luas_bangunan.'m2</td>
                        </tr>
                        <tr>
                            <td style="padding-left:20px">Blok Rumah</td>
                            <td colspan="4">:'.$rumah->tipe->blok.' </td>
                            <td style="padding-left:20px">Luas Tanah</td>
                            <td colspan="4">:'.$rumah->tipe->luas_tanah.'m2</td>
                        </tr>
                        <tr>
                            <td style="padding-left:20px">Nomor Rumah</td>
                            <td colspan="4">:'.$rumah->nomor.'</td>
                            
                        </tr>
                        
        </table>
        <br>
        <table>
            <br>
                    <tr>
                            <td style="padding-left:20px">Harga Yang Disepakati</td>
                            <td colspan="4">: Rp '.$jualrumah->total.'</td>
                            
                        </tr>
                            
                        <tr>
                            <td style="padding-left:20px">Dibayar secara</td>
                            <td colspan="4">: '.$jualrumah->jenis_bayar.'</td>
                            
                        </tr>
        </table>
        
        <table style="border-collapse: collapse; text-align:center;" border=1 >
            <tr>
                <th> KETERANGAN </th>
                <th>  TANGGAL / BULAN / TAHUN </th>
                <th>JUMLAH</th>
            </tr>
            '.$cetakbookingfee.$cetakdanakpr.$cetakangsuran.$cetakuangtambahan. '
            

        </table>
        <br>
        <table>
            <tr>
                <td>Harga Termasuk :</td>
                <td></td>
             </tr>
             <tr>
                 <td></td>
             </tr>
             <tr>
                 <td></td>
             </tr>
             <tr>
                <td>Catatan :</td>
             </tr>
             <tr>
                <td>.....................</td>
             </tr>
             <tr>
                <td>.....................</td>
             </tr>
             <tr>
                <td>.....................</td>
             </tr>
             


        </table>
        <br>
        <br>
        <table>
            <tr>
                <h4>Pembatalan pemesanan dikenakan sanksi sebesar 10% dari harga jual</h4>
             </tr>

        </table>
        <br/>
        <br/>
        <div>
        <p style="text-align:right;padding-right:30px">Surabaya, '.date('d-M-Y').'</p>
                        <table style="text-align:center">
                        <tr>
                            <td>Marketing,</td>
                            <td>Kasir,</td>
                            <td>Pemesan,</td>
                        </tr>
                        
                        <tr>
                            <td height="60"></td>
                            <td height="60"></td>
                            <td height="60"></td>
                        </tr>
                        <tr>
                            <td>....................................</td>
                            <td>....................................</td>
                            <td>....................................</td>
                        </tr>
                        <tr>
                            <td>'.$jualrumah->marketing->karyawan->nama.'</td>
                            <td>'.$jualrumah->kasir->karyawan->nama.'</td>
                            <td>'.$customer->nama.'</td>
                        </tr>
                    </table>
                </div>
      </body></html>
';
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
        $dompdf->stream("samplePDF.pdf", array("Attachment" => false));
    }
}
