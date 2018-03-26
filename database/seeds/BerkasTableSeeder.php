<?php

use Illuminate\Database\Seeder;

class BerkasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('berkas')->insert([
            'nama' => 'Fotokopi KTP',
            'hapuskah' => 0
        ]);

        DB::table('berkas')->insert([
            'nama' => 'Fotokopi NPWP',
            'hapuskah' => 0
        ]);

        DB::table('berkas')->insert([
            'nama' => 'Pas Foto 4x6',
            'hapuskah' => 0
        ]);

        DB::table('berkas')->insert([
            'nama' => 'Slip Gaji Terakhir',
            'hapuskah' => 0
        ]);
    }
}
