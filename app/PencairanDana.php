<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PencairanDana extends Model
{
    protected $fillable = ['tanggal_cair_dana', 'nomor_bukti', 'pemberi', 'penerima' , 'hapuskah'];

    public function jualrumah()
    {
        return $this->belongsTo(JualRumah::class, 'pencairan_dana_id');
    }
}