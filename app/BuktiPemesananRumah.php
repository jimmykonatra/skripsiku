<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuktiPemesananRumah extends Model
{
    protected $fillable = ['nama', 'alamat', 'no_telepon', 'no_ktp' , 'tipe_id','hapuskah'];
}
