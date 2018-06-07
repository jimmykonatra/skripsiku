<?php

use Illuminate\Database\Seeder;

class PengeluaransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengeluarans')->insert([
            'tanggal' => '2018/02/25',
            'nominal' => '60000',
            'keterangan' => 'bayar untuk gali sumur komplek',
            'status_lunas' => 'Hutang',
            'kasir_id' => 2,
            'jenis_pengeluaran_id' => 2,
            'hapuskah' => 0
        ]);

        DB::table('pengeluarans')->insert([
            'tanggal' => '2018/01/18',
            'nominal' => '50000',
            'keterangan' => 'bayar untuk gaji mandor rofi',
            'status_lunas' => 'Lunas',
            'kasir_id' => 1,
            'jenis_pengeluaran_id' => 1,
            'hapuskah' => 0
        ]);
        DB::table('pengeluarans')->insert([
            'tanggal' => '2018/01/18',
            'nominal' => '60000',
            'keterangan' => '',
            'status_lunas' => 'Lunas',
            'kasir_id' => 1,
            'jenis_pengeluaran_id' => 1,
            'hapuskah' => 0
        ]);
    }
}