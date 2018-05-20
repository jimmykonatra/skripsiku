<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::where('hapuskah',0)->get();
        return view('master.customer',compact('customer'));
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
        $kota = $request->kota;
        $email = $request->email;
        $notelepon = $request->notelepon;
        
        Customer::create([
            'nama' => $nama,
            'kota' => $kota,
            'email' => $email,
            'no_telepon' => $notelepon,
            'hapuskah' => 0
        ]);
        Session::flash('flash_msg','Data Customer Berhasil Disimpan');
        return redirect('customer');
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
        $customer = Customer::find($id);
        return response()->json([
            'id' => $id,
            'nama' => $customer->nama,
            'kota' => $customer->kota,
            'email' => $customer->email,
            'notelepon' => $customer->no_telepon
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
        $id = $request->customer;
        $nama = $request->nama;
        $kota = $request->kota;
        $email = $request->email;
        $notelepon = $request->notelepon;
       

        $customer = Customer::find($id);

        $customer->nama = $nama;
        $customer->kota = $kota;
        $customer->email = $email;
        $customer->no_telepon = $notelepon;
       

        $customer->save();
        return redirect('customer');


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $customer = Customer::find($request->customer);
        $customer->hapuskah = 1;
        $customer->save();

      
        return redirect('customer');
    }
}
