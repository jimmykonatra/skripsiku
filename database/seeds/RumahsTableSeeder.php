<?php

use Illuminate\Database\Seeder;

class RumahsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rumahs')->insert([
            'nomor' => 18,
            'tahun' => 2017,
            'status_pembangunan' => 0,
            'status_booking' => 0,
            'status_terjual' => 0,
            'keterangan' => 'Rumah siap huni',
            'perumahan_id' => 1,
            'tipe_id' => 1,
            'gambar' => 0,
            'hapuskah' => 0
        ]);
    }
}
