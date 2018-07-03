<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengeluaran extends Model
{
        protected $fillable = ['tanggal', 'nominal', 'keterangan', 'status_lunas', 'kasir_id', 'jenis_pengeluaran_id','pembangunan_id','hapuskah'];


        public function jenis_pengeluaran()
        {
                return $this->belongsTo(JenisPengeluaran::class, 'jenis_pengeluaran_id');
        }

        public function kasir()
        {
                return $this->belongsTo(User::class, 'kasir_id');
        }
        public function pembangunan()
        {
                return $this->belongsTo(Pembangunan::class,'pembangunan_id');
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

        public static function kekata($x) 
        {
        $x = abs($x);
        $angka = array("", "Satu", "Dua", "Tiga", "Empat", "Lima",
                    "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");

        $temp = "";
        if ($x <12) {
            $temp = " ". $angka[$x];
        } else if ($x <20) {
            $temp = Self::kekata($x - 10). " Belas";
        } else if ($x <100) {
            $temp = Self::kekata($x/10)." Puluh". Self::kekata($x % 10);
        } else if ($x <200) {
            $temp = " Seratus" . Self::kekata($x - 100);
        } else if ($x <1000) {
            $temp = Self::kekata($x/100) . " Ratus" . Self::kekata($x % 100);
        } else if ($x <2000) {
            $temp = " Seribu" . Self::kekata($x - 1000);
        } else if ($x <1000000) {
            $temp = Self::kekata($x/1000) . " Ribu" . Self::kekata($x % 1000);
        } else if ($x <1000000000) {
            $temp = Self::kekata($x/1000000) . " Juta" . Self::kekata($x % 1000000);
        } else if ($x <1000000000000) {
            $temp = Self::kekata($x/1000000000) . " Milyar" . Self::kekata(fmod($x,1000000000));
        } else if ($x <1000000000000000) {
            $temp = Self::kekata($x/1000000000000) . " Trilyun" . Self::kekata(fmod($x,1000000000000));
        }     
        return ucfirst($temp);
        }

}
