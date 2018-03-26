<?php

use Illuminate\Database\Seeder;

class PencairandanasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pencairan_danas')->insert([
            'tanggal_cair_dana' => '2018-02-03',
            'nomor bukti' => '34543',
            'pemberi' => 'Ardi',
            'penerima' => 'Rudi',
            'hapuskah' => 0
        ]);

        DB::table('pencairan_danas')->insert([
            'tanggal_cair_dana' => '2024-03-29',
            'nomor bukti' => '863234',
            'pemberi' => 'Rika',
            'penerima' => 'Rudi',
            'hapuskah' => 0
        ]);
    }
}
