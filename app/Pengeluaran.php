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

        public function kasir()
        {
                return $this->belongsTo(Karyawan::class);
                // return $this->belongsTo('App\Karyawan','kasir_id');
        }
}
