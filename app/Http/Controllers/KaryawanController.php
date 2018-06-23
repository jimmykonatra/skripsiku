<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\User;
use DB;
use Illuminate\Support\Facades\Session;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::where('hapuskah',0)->get();
        return view('master.karyawan', compact('karyawan'));
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
        $username = $request->username;
        $nama = $request->nama;
        $alamat = $request->alamat;
        $notelepon = $request->notelepon;
        $email = $request->email;
        $password = $request->password;
        $jabatan = $request->jabatan;
       
        if($jabatan == 0){
            $jabatan = 'Kasir';
        } 
        else {
            $jabatan = 'Marketing';
        }
        
        $user = User::firstOrNew(
            [
                'username' => $username            
            ],
            [
                'password' => bcrypt($password),
                'jabatan' => $jabatan
            ]
            
            );
       

            if(!($user->exists)) {
                $user->save();
                $user_id = DB::table('users')->max('id');
                $karyawan = new Karyawan([
                    'nama' => $nama,
                    'alamat' => $alamat,
                    'no_telepon' => $notelepon,
                    'email' => $email,
                    'user_id' => $user_id,
                    'hapuskah' => 0
                ]);
                $karyawan->save();
                Session::flash('flash_msg','Data Karyawan Berhasil Disimpan');
            } 
            else {
                Session::flash('error_msg','Data Karyawan Sudah Ada');     
            }
            return redirect('karyawan');
            
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
        $karyawan = Karyawan::find($id);
        return response()->json(
            [
                'id'=>$id,
                'nama'=>$karyawan->nama,
                'alamat'=>$karyawan->alamat,
                'email'=>$karyawan->email,
                'notelepon'=>$karyawan->no_telepon,
                'jabatan'=>$karyawan->user->jabatan
            ]
        );
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
        $id = $request->karyawan;
        $karyawan = Karyawan::find($id);
        $user = User::where('id',$karyawan->user_id)->first();
        $jabatan = $request->jabatan;
        if($jabatan == 0){
            $jabatan = 'Kasir';
        }
        else{
            $jabatan = 'Marketing';
        }
        $karyawan->nama = $request->nama;
        $karyawan->alamat = $request->alamat;
        $karyawan->no_telepon = $request->notelepon;
        $karyawan->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->jabatan = $jabatan;
        $karyawan->save();
        $user->save();
        
        Session::flash('flash_msg','Data Karyawan Berhasil Diubah');
        return redirect('karyawan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $karyawan = Karyawan::find($request->karyawan);
        $karyawan->hapuskah = 1;
        $karyawan->save();
        Session::flash('flash_msg','Data Karyawan Berhasil Dihapus');
        return redirect('karyawan');
    }
}