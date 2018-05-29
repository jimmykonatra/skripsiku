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
        return $this->belongsTo(Kpr::class);
    }

    public function tanda_terima()
    {
        return $this->hasMany(TandaTerima::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function rumah()
    {
        return $this->belongsTo(Rumah::class);
    }
    public function kasir()
    {
        return $this->belongsTo(User::class, 'kasir_id');
    }
    public function marketing()
    {
        return $this->belongsTo(User::class, 'marketing_id');
    }
    public function pencairandana()
    {
        return $this->belongsTo(PencairanDana::class, 'pencairan_dana_id');
    }
    public function getRumah()
    {
        return DB::table('rumahs')
            ->join('tipes','tipes.id','=','rumahs.tipe_id')
            ->where([['tipes.hapuskah','0'],['rumahs.hapuskah','0']])
            ->get();
    }
}

?>
