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

    public function updatetanggalcairdanaindex()
    {
        $jualrumah = JualRumah::where('hapuskah',0)->get();
        $customer = Customer::where('hapuskah',0)->get();
        $marketing = User::where('jabatan','Marketing')->get();
        $kasir = User::where('jabatan','Kasir')->get();
        $rumah = Rumah::where('hapuskah',0)->get();
        $pencairandana = PencairanDana::where('hapuskah',0)->get();
        
        return view('jualrumah.updatetanggalcairdana' , compact('jualrumah','customer','marketing','kasir','rumah','pencairandana'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::where('hapuskah','0')->get();
        $rumah = Rumah::where('status_booking','Kosong')->orWhere('status_pembangunan','0')->orWhere('status_terjual','0')->where('hapuskah', '0')->get();
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
        $jumlahberkas = Berkas::all()->count(); //untuk ambil jumlah berkas 
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
}
