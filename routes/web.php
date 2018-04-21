<?php

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::check())
    {
        return redirect('beranda');
    }
    return redirect('login');
});

Auth::routes();

Route::get('beranda', 'BerandaController@index')->name('beranda');

Route::get('karyawan', 'KaryawanController@index');
Route::post('karyawan/hapus','KaryawanController@destroy');
Route::post('karyawan/lihat', 'KaryawanController@edit');
Route::post('karyawan/ubah','KaryawanController@update');
Route::post('karyawan/tambah','KaryawanController@store');

Route::get('customer', 'CustomerController@index');
Route::post('customer/hapus','CustomerController@destroy');
Route::post('customer/lihat','CustomerController@edit');
Route::post('customer/ubah', 'CustomerController@update');
Route::post('customer/tambah', 'CustomerController@store');

Route::get('bank', 'BankController@index');
Route::post('bank/hapus', 'BankController@destroy');
Route::post('bank/lihat', 'BankController@edit');
Route::post('bank/ubah', 'BankController@update');
Route::post('bank/tambah', 'BankController@store');

Route::get('perumahan', 'PerumahanController@index');
Route::post('perumahan/hapus', 'PerumahanController@destroy');
Route::post('perumahan/lihat', 'PerumahanController@edit');
Route::post('perumahan/ubah', 'PerumahanController@update');
Route::post('perumahan/tambah', 'PerumahanController@store');

Route::get('pengeluaran', 'PengeluaranController@index');
Route::post('pengeluaran/hapus', 'PengeluaranController@destroy');
Route::post('pengeluaran/lihat', 'PengeluaranController@edit');
Route::post('pengeluaran/ubah', 'PengeluaranController@update');
Route::post('pengeluaran/tambah', 'PengeluaranController@store');

Route::get('cicilan', 'CicilanController@index');
Route::post('cicilan/hapus', 'CicilanController@destroy');
Route::post('cicilan/lihat', 'CicilanController@edit');
Route::post('cicilan/ubah', 'CicilanController@update');
Route::post('cicilan/tambah', 'CicilanController@store');

Route::get('jenispengeluaran', 'JenisPengeluaranController@index');
Route::post('jenispengeluaran/hapus', 'JenisPengeluaranController@destroy');
Route::post('jenispengeluaran/lihat', 'JenisPengeluaranController@edit');
Route::post('jenispengeluaran/ubah', 'JenisPengeluaranController@update');
Route::post('jenispengeluaran/tambah', 'JenisPengeluaranController@store');

Route::get('pencairandana', 'PencairanDanaController@index');
Route::post('pencairandana/hapus', 'PencairanDanaController@destroy');
Route::post('pencairandana/lihat', 'PencairanDanaController@edit');
Route::post('pencairandana/ubah', 'PencairanDanaController@update');
Route::post('pencairandana/tambah', 'PencairanDanaController@store');


Route::get('rumah', 'RumahController@index');
Route::post('rumah/hapus', 'RumahController@destroy');
Route::post('rumah/lihat', 'RumahController@edit');
Route::post('rumah/ubah', 'RumahController@update');
Route::post('rumah/tambah', 'RumahController@store');

Route::get('berkas', 'BerkasController@index');
Route::post('berkas/hapus', 'BerkasController@destroy');
Route::post('berkas/lihat', 'BerkasController@edit');
Route::post('berkas/ubah', 'BerkasController@update');
Route::post('berkas/tambah', 'BerkasController@store');


Route::get('nota', 'NotaController@index');
Route::get('nota/buat', 'NotaController@create');
Route::post('nota/hapus', 'NotaController@destroy');
Route::get('nota/lihat/{id}', 'NotaController@edit');
Route::post('nota/ubah', 'NotaController@update');
Route::post('nota/tambah', 'NotaController@store');



