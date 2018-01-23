<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
        protected $fillable = ['tanggal', 'nominal', 'keterangan', 'status_lunas','hapuskah', 'kasir_id','jenis_pengeluaran_id'];

}
