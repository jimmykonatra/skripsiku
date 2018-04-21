<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perumahan extends Model
{
    protected $fillable = ['nama', 'alamat', 'luas', 'hapuskah'];

    public function rumah()
    {
        return $this->hasMany(Rumah::class);
    }
    
}
