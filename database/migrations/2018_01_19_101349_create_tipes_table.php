<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('jalan');
            $table->string('blok');
            $table->double('luas_tanah');
            $table->double('luas_bangunan');
            $table->integer('kamar_tidur');
            $table->integer('kamar_mandi');
            $table->integer('listrik');
            $table->double('harga_asli');
            $table->double('harga_jual');
            $table->double('uang_muka');
            $table->string('deskripsi');
            $table->string('gambar_denah');
            $table->string('gambar_rumah');
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
        Schema::dropIfExists('tipes');
    }
}
