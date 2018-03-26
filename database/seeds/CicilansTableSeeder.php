<?php

use Illuminate\Database\Seeder;

class CicilansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cicilans')->insert([
            'lama_cicilan' => 6,
            'nominal' => 5000000,
            'tipe_id' => 1,
            'bank_id' => 1,
            'hapuskah' => 0
        ]);

        DB::table('cicilans')->insert([
            'lama_cicilan' => 12,
            'nominal' => 2700000,
            'tipe_id' => 1,
            'bank_id' => 1,
            'hapuskah' => 0
        ]);
    }
}
