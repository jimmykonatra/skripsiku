<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuktiPemesananRumahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukti_pemesanan_rumahs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('alamat');
            $table->string('no_telepon');
            $table->string('no_ktp');
            $table->enum('jenis_bayar',['cash','kpr']);
            $table->enum('status',['batal','jadi','selesai']);
            $table->string('keterangan');
            $table->unsignedInteger('tipe_id');
            $table->unsignedInteger('kasir_id');
            $table->unsignedInteger('marketing_id');
            $table->unsignedInteger('customer_id');
            $table->boolean('hapuskah');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukti_pemesanan_rumahs');
    }
}
