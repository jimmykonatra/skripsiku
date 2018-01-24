<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuktiPemesananRumah extends Model
{
    protected $fillable = ['nama', 'alamat', 'no_telepon', 'no_ktp', 'jenis_bayar', 'status','keterangan', 'tipe_id', 'kasir_id', 'marketing_id', 'customer_id', 'hapuskah'];
}
