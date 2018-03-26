<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cicilan extends Model
{
    protected $fillable = ['tipe_id', 'bank_id', 'lama_cicilan', 'nominal', 'hapuskah'];

    public function tipe()
    {
        return $this->belongsTo(Tipe::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

      
}
