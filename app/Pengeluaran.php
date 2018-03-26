<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengeluaran extends Model
{
        protected $fillable = ['tanggal', 'nominal', 'keterangan', 'status_lunas', 'kasir_id','jenis_pengeluaran_id', 'hapuskah'];


        public function jenis_pengeluaran()
        {
                return $this->belongsTo(JenisPengeluaran::class);
                // return $this->belongsTo('App\JenisPengeluaran','jenis_pengeluaran_id');
        }

        public function karyawan()
        {
                // return $this->belongsTo(Karyawan::class);
                return $this->belongsTo(Karyawan::class);
        }
        public static function kasir()
        {       
                return DB::table('karyawans')
                        ->join('users','users.id','=','karyawans.user_id')
                        ->join('pengeluarans','pengeluarans.kasir_id','=','karyawans.id')
                        ->select('karyawans.nama')
                        ->where('users.jabatan','=','Kasir')
                        ->get();
        }
}
