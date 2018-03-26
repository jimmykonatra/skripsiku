<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['nama', 'contact_person', 'no_telepon', 'alamat', 'hapuskah'];

    public function kpr()
    {
        return $this->hasMany(Kpr::class);
    }
}
