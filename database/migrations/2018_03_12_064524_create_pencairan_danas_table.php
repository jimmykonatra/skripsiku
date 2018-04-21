<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePencairandanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencairan_danas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal_cair_dana');
            $table->string('nomor_bukti');
            $table->string('pemberi');
            $table->string('penerima');
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
        Schema::dropIfExists('pencairandanas');
    }
}
