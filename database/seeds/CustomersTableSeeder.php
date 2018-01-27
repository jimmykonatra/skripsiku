<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'nama' => 'Andi',
            'kota' => 'Surabaya',
            'email' => 'andi@gmail.com',
            'no_telepon' => '082123535748',
            'hapuskah' => 0
        ]);

        DB::table('customers')->insert([
            'nama' => 'Ria',
            'kota' => 'Tuban',
            'email' => 'ria@gmail.com',
            'no_telepon' => '082125859732',
            'hapuskah' => 0
        ]);
    }
}
