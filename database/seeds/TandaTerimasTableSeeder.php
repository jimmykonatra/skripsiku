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
            'tanggal' => '09-06-2018',
            'booking_fee' => 500000,
            'uang_muka' => 0,
            'dana_kpr' => 0,
            'uang_tambahan' => '',
            'total' => 500000,
            'keterangan' => '',
            'kasir_id' => 1,
            'jual_rumah_id' => 1,
            'hapuskah' => 0
        ]);

        DB::table('tanda_terimas')->insert([
            'tanggal' => '21-06-2018',
            'booking_fee' => '',
            'uang_muka' => 1500000,
            'dana_kpr' => 0,
            'uang_tambahan' => 0,
            'total' => 1500000,
            'keterangan' => '',
            'kasir_id' => 1,
            'jual_rumah_id' => 1,
            'hapuskah' => 0
        ]);
    }
}
