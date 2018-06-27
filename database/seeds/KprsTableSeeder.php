<?php

use Illuminate\Database\Seeder;

class KprsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kprs')->insert([
            'pemberi' => 'Rina',
            'penerima' => 'Rudi',
            'bank_id' => 1,
            'jual_rumah_id' => 1,
            'kasir_id' => 1,
            'hapuskah' => 0
        ]);

        DB::table('kprs')->insert([
            'pemberi' => 'Rina',
            'penerima' => 'Rudi',
            'bank_id' => 1,
            'jual_rumah_id' => 1,
            'kasir_id' => 1,
            'hapuskah' => 0
        ]);

    }
}
