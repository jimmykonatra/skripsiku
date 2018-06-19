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
            'alamat' => 'Jalan Tenggilis',
            'kota' => 'Surabaya',
            'email' => 'andi@gmail.com',
            'no_telepon' => '082123535748',
            'pekerjaan' => 'Wiraswasta',
            'no_ktp' => '81731723278625',
            'no_rekening' => '733627262',
            'hapuskah' => 0
        ]);

        DB::table('customers')->insert([
            'nama' => 'Rudi',
            'alamat' => 'Jalan Merak',
            'kota' => 'Surabaya',
            'email' => 'rudi@gmail.com',
            'no_telepon' => '066633435748',
            'pekerjaan' => 'Pegawai Swasta',
            'no_ktp' => '81428396025',
            'no_rekening' => '142648972',
            'hapuskah' => 0
        ]);
    }
}
