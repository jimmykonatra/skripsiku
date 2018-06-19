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
            'nomor_sertifikat' => '',
            'status_pembangunan' => '',
            'status_booking' => '',
            'status_terjual' => '',
            'keterangan' => 'Rumah siap huni',
            'perumahan_id' => 1,
            'tipe_id' => 1,
            'hapuskah' => 0
        ]);

        DB::table('rumahs')->insert([
            'nomor' => 33,
            'tahun' => 2018,
            'nomor_sertifikat' => '',
            'status_pembangunan' => '',
            'status_booking' => '',
            'status_terjual' => '',
            'keterangan' => 'Rumah siap huni',
            'perumahan_id' => 1,
            'tipe_id' => 2,
            'hapuskah' => 0
        ]);

        DB::table('rumahs')->insert([
            'nomor' => 11,
            'tahun' => 2018,
            'nomor_sertifikat' => '',
            'status_pembangunan' => '',
            'status_booking' => '',
            'status_terjual' => '',
            'keterangan' => 'Rumah siap huni',
            'perumahan_id' => 2,
            'tipe_id' => 1,
            'hapuskah' => 0
        ]);
    }
}
