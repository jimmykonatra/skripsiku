<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTandaTerimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanda_terimas', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('booking_fee')->nullable();
            $table->bigInteger('dana_kpr')->nullable();
            $table->bigInteger('angsuran')->nullable();
            $table->bigInteger('uang_tambahan')->nullable();
            $table->bigInteger('total');
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
        Schema::dropIfExists('tanda_terimas');
    }
}
