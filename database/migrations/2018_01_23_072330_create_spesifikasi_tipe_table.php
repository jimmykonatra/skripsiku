<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpesifikasiTipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spesifikasi_tipe', function (Blueprint $table) {
            $table->unsignedInteger('spesifikasi_id');
            $table->unsignedInteger('tipe_id');
            $table->string('isi');
            $table->primary(['spesifikasi_id','tipe_id']);
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
        Schema::dropIfExists('spesifikasi_tipe');
    }
}
