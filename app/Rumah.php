<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PerumahanController;

class Rumah extends Model
{
    protected $fillable = ['nomor', 'tahun', 'status_pembangunan','status_booking', 'status_terjual', 'keterangan', 'perumahan_id', 'tipe_id','hapuskah'];

    public function tipe()
    {
        return $this->belongsTo(Tipe::class);
    }

    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class);
    }
}
