<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBerkasNotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas_nota', function (Blueprint $table) {
            $table->unsignedInteger('berkas_id');
            $table->unsignedInteger('nota_id');
            $table->date('tanggal_terima');
            $table->date('tanggal_kembali');
            $table->enum('jenis',['asli','fotokopi']);
            $table->string('keterangan');
            $table->boolean('hapuskah');
            $table->primary(['berkas_id','nota_id']);
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
        Schema::dropIfExists('berkas_nota');
    }
}
