<?php

use Illuminate\Database\Seeder;

class PerumahansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perumahans')->insert([
            'alamat' => 'Jalan Delima',
            'nama' => 'Sapphire',
            'luas' => 1800,
            'hapuskah' => 0
        ]);

        DB::table('perumahans')->insert([
            'alamat' => 'Jalan Durian',
            'nama' => 'Topaz',
            'luas' => 2800,
            'hapuskah' => 0
        ]);
    }
}
