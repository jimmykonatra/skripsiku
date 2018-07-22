<?php

use Illuminate\Database\Seeder;

class PembangunansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pembangunans')->insert([
            'nomor' => '0028',
            'tanggal_mulai' => '2018-06-01',
            'lama_pembangunan' => 90,
            'tanggal_selesai' => null,
            'penanggungjawab' => 'Rudi',
            'rumah_id' => 1,
            'hapuskah' => 0
        ]);
    }
}
