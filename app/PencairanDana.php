<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PencairanDana extends Model
{
    protected $fillable = ['tanggal_cair_dana', 'nomor_bukti', 'pemberi', 'penerima' ,'nominal', 'hapuskah'];

    public function jualrumah()
    {
        return $this->belongsTo(JualRumah::class, 'pencairan_dana_id');
    }
    public function getTanggalCairDanaAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }

    public static function changeDateFormat($value)
    {
        $x = date_create_from_format('d/m/Y', $value);
        return $x->format('Y-m-d');
    }
}
