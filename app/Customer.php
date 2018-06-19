<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['nama','alamat', 'kota', 'email', 'no_telepon','pekerjaan','no_ktp','no_rekening', 'hapuskah'];

    public function jualrumah()
    {
        return $this->belongsTo(JualRumah::class);
    }
}
