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
            $table->bigInteger('booking_fee')->default(0);
            $table->bigInteger('dana_kpr')->default(0);
            $table->bigInteger('angsuran')->default(0);
            $table->bigInteger('uang_tambahan')->default(0);
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
