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

Route::get('beranda', 'BerandaController@beranda')->name('beranda');
Route::get('beranda', 'BerandaController@notifikasi');
Route::get('tentangkami', 'BerandaController@tentangkami')->name('tentangkami');

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

Route::get('pembangunan', 'PembangunanController@index');
Route::post('pembangunan/hapus', 'PembangunanController@destroy');
Route::post('pembangunan/lihat', 'PembangunanController@edit');
Route::post('pembangunan/ubah', 'PembangunanController@update');
Route::post('pembangunan/tambah', 'PembangunanController@store');
Route::post('pembangunan/selesai', 'PembangunanController@selesai');


Route::get('pengeluaran', 'PengeluaranController@index');
Route::post('pengeluaran/hapus', 'PengeluaranController@destroy');
Route::post('pengeluaran/lihat', 'PengeluaranController@edit');
Route::post('pengeluaran/ubah', 'PengeluaranController@update');
Route::post('pengeluaran/tambah', 'PengeluaranController@store');
Route::get('pengeluaran/cetak/{id}','PengeluaranController@print');


Route::get('cicilan', 'CicilanController@index');
Route::post('cicilan/hapus', 'CicilanController@destroy');
Route::post('cicilan/lihat', 'CicilanController@edit');
Route::post('cicilan/ubah', 'CicilanController@update');
Route::post('cicilan/tambah', 'CicilanController@store');

Route::get('tandaterima', 'TandaTerimaController@index');
Route::post('tandaterima/hapus', 'TandaTerimaController@destroy');
Route::post('tandaterima/lihat', 'TandaTerimaController@edit');
Route::post('tandaterima/ubah', 'TandaTerimaController@update');
Route::post('tandaterima/tambah', 'TandaTerimaController@store');
Route::post('tandaterima/lihattotal','TandaTerimaController@lihattotal');
Route::get('tandaterima/cetak/{id}','TandaTerimaController@print');

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

Route::get('updatenomorsertifikat', 'RumahController@updatenomorsertifikatindex');
Route::post('updatenomorsertifikat/lihat', 'RumahController@updatenomorsertifikatedit');
Route::post('updatenomorsertifikat/ubah', 'RumahController@updatenomorsertifikatupdate');


Route::get('tipe', 'TipeController@index');
Route::post('tipe/hapus', 'TipeController@destroy');
Route::post('tipe/lihat', 'TipeController@edit');
Route::post('tipe/ubah', 'TipeController@update');
Route::post('tipe/tambah', 'TipeController@store');



Route::get('kpr', 'KprController@index');
Route::post('kpr/hapus', 'KprController@destroy');
Route::post('kpr/lihat', 'KprController@edit');
Route::post('kpr/ubah', 'KprController@update');
Route::post('kpr/tambah', 'KprController@store');

Route::get('updatetanggalakadkredit', 'KprController@updatetanggalakadkreditindex');
Route::post('updatetanggalakadkredit/lihat', 'KprController@updatetanggalakadkreditedit');
Route::post('updatetanggalakadkredit/ubah', 'KprController@updatetanggalakadkreditupdate');

Route::get('updatetanggalcair', 'KprController@updatetanggalcairindex');
Route::post('updatetanggalcair/lihat', 'KprController@updatetanggalcairedit');
Route::post('updatetanggalcair/ubah', 'KprController@updatetanggalcairupdate');

Route::get('updatetanggalserahsertifikatnotaris', 'KprController@updatetanggalserahsertifikatnotarisindex');
Route::post('updatetanggalserahsertifikatnotaris/lihat', 'KprController@updatetanggalserahsertifikatnotarisedit');
Route::post('updatetanggalserahsertifikatnotaris/ubah', 'KprController@updatetanggalserahsertifikatnotarisupdate');


Route::get('berkas', 'BerkasController@index');
Route::post('berkas/hapus', 'BerkasController@destroy');
Route::post('berkas/lihat', 'BerkasController@edit');
Route::post('berkas/ubah', 'BerkasController@update');
Route::post('berkas/tambah', 'BerkasController@store');

Route::get('jualrumah', 'JualRumahController@index');
Route::get('jualrumah/buat', 'JualRumahController@create');
Route::post('jualrumah/hapus', 'JualRumahController@destroy');
Route::get('jualrumah/lihat/{id}', 'JualRumahController@edit');
Route::post('jualrumah/ubah', 'JualRumahController@update');
Route::post('jualrumah/tambah', 'JualRumahController@store');
Route::get('jualrumah/cetak/{id}','JualRumahController@print');

Route::get('laporanrumahterjual','JualRumahController@laporanrumahterjual');
Route::post('laporanrumahterjual/lihat','JualRumahController@laporanrumahterjualindex');
Route::post('laporanrumahterjual/cetak','JualRumahController@laporanrumahterjualprint');


Route::get('laporanpengeluaran','PengeluaranController@laporanpengeluaran');
Route::post('laporanpengeluaran/lihat','PengeluaranController@laporanpengeluaranindex');
Route::post('laporanpengeluaran/cetak','PengeluaranController@laporanpengeluaranprint');

Route::get('updatetanggalcairdana', 'JualRumahController@updatetanggalcairdanaindex');
Route::post('updatetanggalcairdana/ubah', 'JualRumahController@updatetanggalcairdanaupdate');
Route::post('updatetanggalcairdana/lihat', 'JualRumahController@updatetanggalcairdanaedit');





