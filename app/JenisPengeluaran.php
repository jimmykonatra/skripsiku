<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisPengeluaran extends Model
{
    protected $fillable = ['nama', 'hapuskah'];

    public function pengeluaran()
    {
        
    }
}
