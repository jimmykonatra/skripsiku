<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
        protected $fillable = ['nomor','tanggal_buat', 'total', 'status_kelengkapan', 'customer_id', 'marketing_id', 'kasir_id', 'rumah_id','tipe_id', 'hapuskah'];

        

}
