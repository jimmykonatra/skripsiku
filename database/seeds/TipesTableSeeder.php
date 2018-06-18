<?php

use Illuminate\Database\Seeder;

class TipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipes')->insert([
            'nama' => 'Tipe 35',
            'jalan' => 'Jalan Nangka',
            'blok' => 'M',
            'luas_tanah' => 120,
            'luas_bangunan' => 75,
            'kamar_tidur' => 2,
            'kamar_mandi' => 1,
            'listrik' => 2200,
            'harga_asli' => 105000000,
            'harga_jual' => 125000000,
            'uang_muka' => 5000000,
            'deskripsi' => 'Tipe yang cocok untuk anda',
            'gambar_denah' => '',
            'gambar_rumah' => '',
            'lainnya' => '',
            'hapuskah' => 0
            ]);

        DB::table('tipes')->insert([
            'nama' => 'Tipe 20',
            'jalan' => 'Jalan Delima',
            'blok' => 'Q',
            'luas_tanah' => 100,
            'luas_bangunan' => 65,
            'kamar_tidur' => 2,
            'kamar_mandi' => 1,
            'listrik' => 2200,
            'harga_asli' => 95000000,
            'harga_jual' => 1155000000,
            'uang_muka' => 4000000,
            'deskripsi' => 'Tipe yang cocok untuk anda',
            'gambar_denah' => '',
            'gambar_rumah' => '',
            'lainnya' => '',
            'hapuskah' => 0
        ]);
    }
}
