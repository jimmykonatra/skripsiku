<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengeluaran extends Model
{
        protected $fillable = ['tanggal', 'nominal', 'keterangan', 'status_lunas', 'kasir_id', 'jenis_pengeluaran_id', 'hapuskah'];


        public function jenis_pengeluaran()
        {
                return $this->belongsTo(JenisPengeluaran::class, 'jenis_pengeluaran_id');
        }

        public function kasir()
        {
                return $this->belongsTo(User::class, 'kasir_id');
        }
        public function getTanggalAttribute($value)
        {
                return date('d-m-Y', strtotime($value));
        }
        public function getTanggalbuatAttribute($value)
        {
                return date('d-m-Y', strtotime($value));
        }
        public static function changeDateFormat($value)
        {
                $x = date_create_from_format('d/m/Y', $value);
                return $x->format('Y-m-d');
        }
}
