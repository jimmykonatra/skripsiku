<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRumahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rumahs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nomor');
            $table->year('tahun');
            $table->string('nomor_sertifikat')->nullable();
            $table->enum('status_pembangunan',(['Belum Dibangun','Proses Pembangunan','Selesai Pembangunan']))->default('Belum Dibangun');
            $table->enum('status_booking',(['Terbooking','Kosong']))->default('Kosong');
            $table->enum('status_terjual',(['Terjual','Belum Terjual']))->default('Belum Terjual');
            $table->string('keterangan')->nullable();
            $table->unsignedInteger('perumahan_id');
            $table->unsignedInteger('tipe_id');
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
        Schema::dropIfExists('rumahs');
    }
}
