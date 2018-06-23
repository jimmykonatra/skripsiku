<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembangunan extends Model
{
    protected $fillable = ['nomor', 'tanggal_mulai', 'lama_pembangunan', 'tanggal_selesai', 'penanggungjawab','rumah_id' , 'hapuskah'];

    public function rumah()
    {
        return $this->belongsTo(Rumah::class);
    }

    public function pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class);
    }
    public function getTanggalMulaiAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }
    public function getTanggalAkhirAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }
    public static function changeDateFormat($value)
    {
        $x = date_create_from_format('d/m/Y', $value);
        return $x->format('Y-m-d');
    }
}
