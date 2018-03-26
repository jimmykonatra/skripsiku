<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBerkasJualrumahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas_jual_rumah', function (Blueprint $table) {
            $table->unsignedInteger('berkas_id');
            $table->unsignedInteger('jual_rumah_id');
            $table->date('tanggal_terima');
            $table->date('tanggal_kembali');
            $table->boolean('hapuskah');
            $table->primary(['berkas_id', 'jual_rumah_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berkas_jualrumah');
    }
}
