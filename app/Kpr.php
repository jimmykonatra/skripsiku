<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kpr extends Model
{
    protected $fillable = ['tanggal_cair', 'tanggal_akad_kredit', 'tanggal_serah_terima_sertifikat','pemberi','penerima','bank_id','jual_rumah_id', 'kasir_id','hapuskah'];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
    
    public function jual_rumah()
    {
        return $this->belongsTo(JualRumah::class);
    }

    public function kasir()
    {
        return $this->belongsTo(User::class);
    }
    public function gettanggalcairkprAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }
}
