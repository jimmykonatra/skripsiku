<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'password', 'jabatan'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function karyawans()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function kpr()
    {
        return $this->hasMany(Kpr::class);
    }
    
    public function pengeluaran()
    {
        return $this->belongsTo(Pengeluaran::class);
    }
}
