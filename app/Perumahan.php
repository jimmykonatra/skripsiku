<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perumahan extends Model
{
    protected $fillable = ['alamat', 'nama', 'luas', 'hapuskah'];
}
