<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kpr extends Model
{
    protected $fillable = ['tanggal_cair', 'tanggal_acc', 'bank_id', 'nota_no','hapuskah'];
}
