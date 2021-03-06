<?php

use Illuminate\Database\Seeder;

class JualRumahsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jual_rumahs')->insert([
            'nomor_nota' => '342432',
            'tanggal_buat'=> '2018-11-10',
            'total' => 125000000,
            'status_kelengkapan' => 'Tidak Lengkap',
            'keterangan' => 'Rumah yang dihuni pak rido',
            'tanggal_serah_terima_rumah' => null,
            'jenis_bayar' => 'KPR',
            'status_jual_rumah' => 'Proses DP',
            'status_dp' => 'Belum Lunas',
            'customer_id' => 1,
            'rumah_id' => 1,
            'marketing_id' => 2,
            'kasir_id' => 1,
            'pencairan_dana_id' => 1,
            'hapuskah' => 0
        ]);
    }
}
