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
            $table->string('nama');
            $table->double('booking_fee');
            $table->double('angsuran');
            $table->double('dana_kpr');
            $table->double('uang_tambahan');
            $table->double('total');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('tipe_id');
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
