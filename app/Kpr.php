<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kpr extends Model
{
    protected $fillable = ['tanggal_cair', 'tanggal_akad_kredit', 'tanggal_serah_terima_sertifikat','tanggal_serah_sertifikat_bank','pemberi','penerima','bank_id','jual_rumah_id', 'kasir_id','hapuskah'];

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

    //format date
    public function getTanggalAkadKreditAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }
    public function getTanggalCairAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }
    public function getTanggalSerahTerimaSertifikatAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }
    public function getTanggalSerahSertifikatBankAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }

    public static function changeDateFormat($value)
    {
        $x = date_create_from_format('d/m/Y', $value);

        return $x->format('Y-m-d');
    }

}
