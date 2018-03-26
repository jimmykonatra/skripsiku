<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TandaTerima extends Model
{
    protected $fillable = ['booking_fee','angsuran','dana_kpr', 'uang_tambahan','total', 'jual_rumah_id','kasir_id','hapuskah'];

    public function jual_rumah()
    {
        return $this->belongsTo(JualRumah::class);
    }

    public function kasir()
    {
        return $this->belongsTo(User::class);
    }
}
