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