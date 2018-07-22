<?php

use Illuminate\Database\Seeder;

class KaryawansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawans')->insert([
            'nama' => 'Admin',
            'alamat' => 'Jalan Randu 01',
            'email' => 'admin@gmail.com',
            'no_telepon' => '082234567899',
            'hapuskah' => 0,
            'user_id' => 1
        ]);

        DB::table('karyawans')->insert([
            'nama' => 'Budi',
            'alamat' => 'Jalan Babatan',
            'email' => 'budi@gmail.com',
            'no_telepon' => '083424234234',
            'hapuskah' => 0,
            'user_id' => 2
        ]);
    }
}
