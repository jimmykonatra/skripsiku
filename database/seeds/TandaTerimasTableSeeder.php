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
            'booking_fee' => 0,
            'angsuran' => 500000,
            'dana_kpr' => 0,
            'uang_tambahan' => 300000,
            'total' => 800000,
            'keterangan' => 'qwerty',
            'kasir_id' => 1,
            'jual_rumah_id' => 1,
            'hapuskah' => 0
        ]);

        DB::table('tanda_terimas')->insert([
            'booking_fee' => 1000000,
            'angsuran' => 500000,
            'dana_kpr' => 0,
            'uang_tambahan' => 300000,
            'total' => 1800000,
            'keterangan' => 'qwerty',
            'kasir_id' => 1,
            'jual_rumah_id' => 1,
            'hapuskah' => 0
        ]);
    }
}
