<?php

use Illuminate\Database\Seeder;

class PencairanDanasTableSeeder extends Seeder
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
            'nomor_bukti' => '34543',
            'pemberi' => 'Ardi',
            'penerima' => 'Rudi',
            'hapuskah' => 0
        ]);

        DB::table('pencairan_danas')->insert([
            'tanggal_cair_dana' => '2024-03-29',
            'nomor_bukti' => '863234',
            'pemberi' => 'Rika',
            'penerima' => 'Rudi',
            'hapuskah' => 0
        ]);
    }
}
