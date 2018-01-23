<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TandaTerima extends Model
{
    protected $fillable = ['booking_fee','angsuran','dana_kpr', 'uang_tambahan','total', 'customer_id', 'tipe_id','hapuskah'];
}
