<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipe;
use Illuminate\Support\Facades\Session;

class TipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipe = Tipe::where('hapuskah',0)->get();

        return view('master.tipe', compact('tipe'));
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
        $nama = $request->nama;
        $jalan = $request->jalan;
        $blok = $request->blok;
        $luastanah = $request->luastanah;
        $luasbangunan = $request->luasbangunan;
        $kamartidur = $request->kamartidur;
        $kamarmandi = $request->kamarmandi;
        $listrik = $request->listrik;
        $hargaasli = $request->hargaasli;
        $hargajual = $request->hargajual;
        $uangmuka = $request->uangmuka;
        $deskripsi = $request->deskripsi;
        $lainnya = $request->lainnya;
        $gambarrumah = $request->gambarrumah;
        $gambardenah = $request->gambardenah;

        // $uploadgambardenah = $request->gambardenah->getClientOriginalName();
        // $request->gambardenah->move(public_path('images'), $uploadgambardenah);

        // $uploadgambarrumah = $request->gambarrumah->getClientOriginalName();
        // $request->gambarrumah->move(public_path('images'), $uploadgambarrumah);

        if (isset($uploadgambardenah)) {
        $uploadgambardenah = $request->gambardenah->getClientOriginalName();
            $request->gambardenah->move(public_path('images'), $uploadgambardenah);
        } else {
            $uploadgambardenah = null;
        }


        if (isset($uploadgambarrumah)) {
        $uploadgambarrumah = $request->gambarrumah->getClientOriginalName();
            $request->gambarrumah->move(public_path('images'), $uploadgambarrumah);
        } else {
            $uploadgambarrumah = null;
        }


        // $tipe = Tipe::create([
        //     'nama' => $nama,
        //     'jalan' => $jalan,
        //     'blok' => $blok,
        //     'luas_tanah' => $luastanah,
        //     'luas_bangunan' => $luasbangunan,
        //     'kamar_tidur' => $kamartidur,
        //     'kamar_mandi' => $kamarmandi,
        //     'listrik' => $listrik,
        //     'harga_asli' => $hargaasli,
        //     'harga_jual' => $hargajual,
        //     'uang_muka' => $uangmuka,
        //     'deskripsi' => $deskripsi,
        //     'lainnya' => $lainnya,
        //     'gambar_rumah' => $uploadgambarrumah,
        //     'gambar_denah' => $uploadgambardenah,
        //     'hapuskah' => 0
        // ]);

        $tipe = Tipe::firstOrCreate(
            ['nama' => $nama,
            'jalan' => $jalan,
            'blok' =>  $blok,
                'luas_tanah' => $luastanah,
                'luas_bangunan' => $luasbangunan,
                'kamar_tidur' => $kamartidur,
                'kamar_mandi' => $kamarmandi,
                'listrik' => $listrik,
                'harga_asli' => $hargaasli,
                'harga_jual' => $hargajual,
                'uang_muka' => $uangmuka,
                'deskripsi' => $deskripsi,
                'lainnya' => $lainnya
            ],
            [
                'gambar_rumah' => $uploadgambarrumah,
                'gambar_denah' => $uploadgambardenah,
                'hapuskah' => 0
            ]
        );
        if($tipe->wasRecentlyCreated)
        {
            Session::flash('flash_msg', 'Data Tipe Berhasil Disimpan');
        }
        else {
            Session::flash('warning_msg', 'Data Tipe Telah Terdaftar');
        }
        return redirect('tipe');
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
        $tipe = Tipe::find($id);
        return response()->json([
            'id' => $id,
            'nama' => $tipe->nama,
            'jalan' => $tipe->jalan,
            'blok' => $tipe->blok,
            'luastanah' => $tipe->luas_tanah,
            'luasbangunan' => $tipe->luas_bangunan,
            'kamartidur' => $tipe->kamar_tidur,
            'kamarmandi' => $tipe->kamar_mandi,
            'listrik' => $tipe->listrik,
            'hargaasli' => $tipe->harga_asli,
            'hargajual' => $tipe->harga_jual,
            'uangmuka' => $tipe->uang_muka,
            'deskripsi' => $tipe->deskripsi,
            'gambardenah' => $tipe->gambar_denah,
            'gambarrumah' => $tipe->gambar_rumah,
            'lainnya' => $tipe->lainnya 
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
        $id = $request->tipe;
        $nama = $request->nama;
        $jalan = $request->jalan;
        $blok = $request->blok;
        $luastanah = $request->luastanah;
        $luasbangunan = $request->luasbangunan;
        $kamarmandi = $request->kamarmandi;
        $kamartidur = $request->kamartidur;
        $listrik = $request->listrik;
        $hargaasli = $request->hargaasli;
        $hargajual = $request->hargajual;
        $uangmuka = $request->uangmuka;
        $deskripsi = $request->deskripsi;
        $gambardenah = $request->gambardenah;
        $gambarrumah = $request->gambarrumah;
        $lainnya = $request->lainnya;

        $tipe = Tipe::find($id);

        $tipe->nama = $nama;
        $tipe->jalan = $jalan;
        $tipe->blok = $blok;
        $tipe->luas_tanah = $luastanah;
        $tipe->luas_bangunan = $luasbangunan;
        $tipe->kamar_mandi = $kamarmandi;
        $tipe->kamar_tidur = $kamartidur;
        $tipe->listrik = $listrik;
        $tipe->harga_asli = $hargaasli;
        $tipe->harga_jual = $hargajual;
        $tipe->uang_muka = $uangmuka;
        $tipe->deskripsi = $deskripsi;

        
        $tipe->gambar_denah = $request->gambardenah->getClientOriginalName();
        if(isset($tipe->gambar_denah))
        {
            $request->gambardenah->move(public_path('images'), $tipe->gambar_denah);
        }
        else {
            $tipe->gambar_denah = null;
        }
        

        $tipe->gambar_rumah = $request->gambarrumah->getClientOriginalName();
        if(isset($tipe->gambar_rumah))
        {
            $request->gambarrumah->move(public_path('images'), $tipe->gambar_rumah);
        }
        else {
            $tipe->gambar_rumah = null;
        }

        $tipe->lainnya = $lainnya;
        $tipe->save();
        Session::flash('flash_msg', 'Data Tipe Berhasil Disimpan');
        return redirect('tipe');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tipe = Tipe::find($request->tipe);
        $tipe->hapuskah = 1;
        $tipe->save();

        Session::flash('flash_msg', 'Data Tipe Berhasil Dihapus');
        return redirect('tipe');
    }
}
