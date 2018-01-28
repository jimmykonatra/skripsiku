<?php

use Illuminate\Database\Seeder;

class JenisPengeluaransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_pengeluarans')->insert([
            'nama' => 'Bayar Mandor',
            'hapuskah' => 0
        ]);

        DB::table('jenis_pengeluarans')->insert([
            'nama' => 'Bayar Gali Sumur',
            'hapuskah' => 0
        ]);

    }
}
