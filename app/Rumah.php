<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    protected $fillable = ['nomor', 'tahun', 'status_pembangunan', 'status_terjual', 'keterangan', 'hapuskah', 'perumahan_id', 'tipe_id'];
}
