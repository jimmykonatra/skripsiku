<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKprsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kprs', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal_cair')->nullable();
            $table->date('tanggal_akad_kredit')->nullable();
            $table->date('tanggal_serah_terima_sertifikat')->nullable();
            $table->string('pemberi');
            $table->string('penerima');
            $table->unsignedInteger('bank_id');
            $table->unsignedInteger('jual_rumah_id');
            $table->unsignedInteger('kasir_id');
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
        Schema::dropIfExists('kprs');
    }
}
