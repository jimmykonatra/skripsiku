<?php

use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            'nama' => 'BCA',
            'contact_person' => 'Dian',
            'no_telepon' => '082144834738',
            'alamat' => 'Jalan Rungkut Mapan Timur',
            'hapuskah' => 0
        ]);

        DB::table('banks')->insert([
            'nama' => 'Mandiri',
            'contact_person' => 'Rudi',
            'no_telepon' => '082257382910',
            'alamat' => 'Jalan Durian Timur',
            'hapuskah' => 0
        ]);
    }
}
