<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal_buat');
            $table->bigInteger('total');
            $table->date('tanggal_serah_terima');
            $table->enum('status_kelengkapan',['lengkap','tidak_lengkap']);
            $table->string('keterangan');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('marketing_id');
            $table->unsignedInteger('kasir_id');
            $table->unsignedInteger('rumah_id');
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
        Schema::dropIfExists('notas');
    }
}
