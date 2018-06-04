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
            $table->tinyInteger('status_pembangunan');
            $table->tinyInteger('status_booking');
            $table->tinyInteger('status_terjual');
            $table->string('keterangan');
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
