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
            $table->date('tanggal_cair');
            $table->date('tanggal_acc');
            $table->unsignedInteger('bank_id');
            $table->unsignedInteger('nota_id');
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
