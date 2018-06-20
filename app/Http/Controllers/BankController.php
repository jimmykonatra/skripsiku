<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use Illuminate\Support\Facades\Session;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = Bank::where('hapuskah',0)->get();
        return view('master.bank', compact('bank'));
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
        $contactperson = $request->contactperson;
        $notelepon = $request->notelepon;
        $alamat = $request->alamat;

        // Bank::create([
        //     'nama' => $nama,
        //     'contact_person' => $contactperson,
        //     'no_telepon' => $notelepon,
        //     'alamat' => $alamat,
        //     'hapuskah' => 0
        // ]);

        $bank = Bank::firstOrCreate(
            ['nama' => $nama],
            ['contact_person ' => $contactperson,
                'no_telepon ' => $notelepon,
                'alamat ' => $alamat,
                'hapuskah' => 0]);

        if($bank->wasRecentyCreated)
        {
            Session::flash('flash_msg', 'Data Bank Berhasil Disimpan');
        }
        else {
            Session::flash('error_msg', 'Data Bank Sudah Ada');
        }
            
            return redirect('bank');
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
        $bank = Bank::find($id);
        return response()->json([
            'id' => $id,
            'nama' => $bank->nama,
            'contactperson' => $bank->contact_person,
            'notelepon' => $bank->no_telepon,
            'alamat' => $bank->alamat
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
        $id = $request->bank;
        $nama = $request->nama;
        $contactperson = $request->contactperson;
        $notelepon = $request->notelepon;
        $alamat = $request->alamat;

        $bank = Bank::find($id);

        $bank->nama = $nama;
        $bank->contact_person = $contactperson;
        $bank->no_telepon = $notelepon;
        $bank->alamat = $alamat;
        $bank->save();

        Session::flash('flash_msg', 'Data Bank Berhasil Diubah');
        return redirect('bank');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $bank = Bank::find($request->bank);
        $bank->hapuskah = 1;
        $bank->save();
        return redirect('bank');
    }
}