<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembangunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembangunans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor');
            $table->date('tanggal_mulai');
            $table->integer('lama_pembangunan');
            $table->date('tanggal_selesai')->nullable();
            $table->string('penanggungjawab');
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
        Schema::dropIfExists('pembangunans');
    }
}
