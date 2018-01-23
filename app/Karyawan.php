<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = ['nama', 'alamat', 'email', 'no_telepon','user_id', 'hapuskah'];
}
