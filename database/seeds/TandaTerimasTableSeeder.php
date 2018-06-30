<?php

use Illuminate\Database\Seeder;

class TandaTerimasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tanda_terimas')->insert([
            'tanggal' => '25-06-2018',
            'booking_fee' => 0,
            'uang_muka' => 0,
            'dana_kpr' => 0,
            'uang_tambahan' => 300000,
            'total' => 800000,
            'keterangan' => 'qwerty',
            'kasir_id' => 1,
            'jual_rumah_id' => 1,
            'hapuskah' => 0
        ]);

        DB::table('tanda_terimas')->insert([
            'tanggal' => '09-06-2018',
            'booking_fee' => 1000000,
            'uang_muka' => 500000,
            'dana_kpr' => 0,
            'uang_tambahan' => 0,
            'total' => 1800000,
            'keterangan' => 'qwerty',
            'kasir_id' => 1,
            'jual_rumah_id' => 1,
            'hapuskah' => 0
        ]);
    }
}
