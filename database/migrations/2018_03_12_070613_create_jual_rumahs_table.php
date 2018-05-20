<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJualrumahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jual_rumahs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_nota');
            $table->date('tanggal_dp');
            $table->date('tanggal_buat');
            $table->double('total');
            $table->enum('status_kelengkapan', ['Tidak Lengkap', 'Lengkap']);
            $table->string('keterangan');
            $table->date('tanggal_serah_terima_rumah')->nullable();
            $table->enum('jenis_bayar',['Cash','KPR']);
            $table->enum('status_jual_rumah',['Batal','Jadi','Selesai']);
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('rumah_id');
            $table->unsignedInteger('marketing_id');
            $table->unsignedInteger('kasir_id');
            $table->unsignedInteger('pencairan_dana_id');
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
        Schema::dropIfExists('jualrumahs');
    }
}
