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
use Illuminate\Support\Facades\DB;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nota = Nota::where('hapuskah',0)->get();
        return view('nota.nota' , compact('nota'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        $rumah = Rumah::all();
        $berkas = Berkas::all();
        
        $marketing = User::join('karyawans','users.id','=','karyawans.user_id')->where([['jabatan','Marketing'],['karyawans.hapuskah',0]])->get();
        $kasir = User::join('karyawans','users.id','=','karyawans.user_id')->where([['jabatan', 'Kasir'], ['karyawans.hapuskah', 0]])->get();
        return view('nota.buatnota', compact('customer','rumah','berkas','marketing','kasir'));

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
        $total = $request->total;
        $rumah = $request->rumah;
        $tanggalbuat = $request->ambiltanggalbuat;
        $tanggalserahterima = $request->tanggalserahterima;
        $berkas = $request->berkas;
        $keterangan = $request->keterangan;

        $jumlahberkas = Berkas::all()->count(); //untuk ambil jumlah berkas 
        $marketing = $request->marketing;
        $kasir = $request->kasir;

                
        if(count($berkas) ==$jumlahberkas)
        {
            $lengkap = 1;
        } else {
           
            $lengkap = 0;
        }

        $inputnota = Nota::create([
            'nomor' => $nomornota,
            'tanggal_buat' => $tanggalbuat,
            'total' => $total,
            'tanggal_serah_terima' => $tanggalserahterima,
            'status_kelengkapan' => $lengkap,
            'keterangan' => $keterangan,
            'customer_id' => $customer,
            'marketing_id' => $marketing,
            'kasir_id' => $kasir,
            'rumah_id' => $rumah,
            'hapuskah' => 0
        ]);

        foreach ($berkas as $berkas) {
            DB::table('berkas_nota')->insert([
                'nota_id' => $inputnota->id,
                'berkas_id' => $berkas,
                'tanggal_terima' => $tanggalbuat,
                'tanggal_kembali' => null,
                'hapuskah' => 0
            ]);
            return redirect('nota');
        }

        
    
            
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
        $nota = Nota::find($id);
        $customer = Customer::all();
        $rumah = Rumah::all();
        $berkas = Berkas::all();


        $marketing = User::join('karyawans', 'users.id', '=', 'karyawans.user_id')->where([['jabatan', 'Marketing'], ['karyawans.hapuskah', 0]])->get();
        $kasir = User::join('karyawans', 'users.id', '=', 'karyawans.user_id')->where([['jabatan', 'Kasir'], ['karyawans.hapuskah', 0]])->get();
        
        $cekberkas = DB::table('berkas_nota')->where('nota_id','=',$id)->get();

        
        return view('nota.ubahnota', compact('cekberkas','nota','customer', 'rumah', 'berkas', 'marketing', 'kasir'));

     

        
        
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
    public function destroy($id)
    {
        //
    }
}
