<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    protected $fillable = ['nama', 'jalan','blok', 'luas_tanah', 'luas_bangunan', 'kamar_mandi', 'kamar_tidur', 'listrik', 'harga_asli', 'harga_jual', 'uang_muka','deskripsi','gambar_denah','gambar_rumah','lainnya', 'hapuskah'];

    public function rumah(){

        return $this->hasMany(Rumah::class);
    }

    public function cicilan()
    {
        return $this->hasMany(Cicilan::class);
    }
}
