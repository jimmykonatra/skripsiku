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
            'nama' => 'Jimmy Konatra',
            'alamat' => 'Jalan Delima',
            'email' => 'jimmykonatra@gmail.com',
            'no_telepon' => '082218000965',
            'hapuskah' => 0,
            'user_id' => 1
        ]);

        DB::table('karyawans')->insert([
            'nama' => 'Ria Setiawan',
            'alamat' => 'Jalan Babatan',
            'email' => 'ria@gmail.com',
            'no_telepon' => '083424234234',
            'hapuskah' => 0,
            'user_id' => 2
        ]);
    }
}
