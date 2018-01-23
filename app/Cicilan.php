<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cicilan extends Model
{
    protected $fillable = ['lama_cicilan', 'nominal', 'tipe_id', 'bank_id', 'hapuskah'];
}
