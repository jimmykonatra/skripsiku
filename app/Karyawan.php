<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = ['nama', 'alamat', 'email', 'no_telepon','user_id', 'hapuskah'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function pengeluaran()
    {
        return $this->hasOne(Pengeluaran::class);
    }
   
}
