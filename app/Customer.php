<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['nama', 'kota', 'email', 'no_telepon', 'hapuskah'];
}
