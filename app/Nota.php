<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
        protected $fillable = ['tanggal_buat', 'total', 'status_kelengkapan','hapuskah', 'customer_id', 'marketing_id', 'kasir_id', 'rumah_id'];

}
