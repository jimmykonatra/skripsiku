<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JualRumah extends Model
{
    protected $fillable = [
        'nomor_nota',
        'tanggal_dp',
        'tanggal_buat',
        'total',
        'status_kelengkapan',
        'keterangan',
        'tanggal_serah_terima_rumah',
        'jenis_bayar',
        'status_jual_rumah',
        'customer_id',
        'marketing_id',
        'kasir_id',
        'rumah_id',
        'pencairan_dana_id',
        'hapuskah'
    ];

    public function kpr()
    {
        return $this->hasMany(Kpr::class);
    }

    public function tanda_terima()
    {
        return $this->hasMany(TandaTerima::class);
    }
}

?>
