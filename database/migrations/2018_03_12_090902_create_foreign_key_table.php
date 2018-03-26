<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('karyawans', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('kprs', function (Blueprint $table) {
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jual_rumah_id')->references('id')->on('jual_rumahs')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('pengeluarans', function (Blueprint $table) {
            $table->foreign('kasir_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jenis_pengeluaran_id')->references('id')->on('jenis_pengeluarans')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('rumahs', function (Blueprint $table) {
            $table->foreign('perumahan_id')->references('id')->on('perumahans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipe_id')->references('id')->on('tipes')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('tanda_terimas', function (Blueprint $table) {
            $table->foreign('kasir_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jual_rumah_id')->references('id')->on('jual_rumahs')->onDelete('cascade')->onUpdate('cascade');
                        
        });

        Schema::table('cicilans', function (Blueprint $table) {
            $table->foreign('tipe_id')->references('id')->on('tipes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('berkas_jual_rumah', function (Blueprint $table) {
            $table->foreign('berkas_id')->references('id')->on('berkas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jual_rumah_id')->references('id')->on('jual_rumahs')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('jual_rumahs', function (Blueprint $table) {
            $table->foreign('kasir_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('marketing_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('rumah_id')->references('id')->on('rumahs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pencairan_dana_id')->references('id')->on('pencairan_danas')->onDelete('cascade')->onUpdate('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('karyawans', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('kprs', function (Blueprint $table) {
            $table->dropForeign(['bank_id']);
            $table->dropForeign(['jual_rumah_id']);
        });

        Schema::table('pengeluarans', function (Blueprint $table) {
            $table->dropForeign(['kasir_id']);
            $table->dropForeign(['jenis_pengeluaran_id']);
        });

        Schema::table('rumahs', function (Blueprint $table) {
            $table->dropForeign(['perumahan_id']);
            $table->dropForeign(['tipe_id']);
        });

        Schema::table('tanda_terimas', function (Blueprint $table) {
            $table->dropForeign(['kasir_id']);
            $table->dropForeign(['jual_rumah_id']);
        });


        Schema::table('cicilans', function (Blueprint $table) {
            $table->dropForeign(['tipe_id']);
            $table->dropForeign(['bank_id']);
        });

        Schema::table('berkas_jual_rumah', function (Blueprint $table) {
            $table->dropForeign(['berkas_id']);
            $table->dropForeign(['jual_rumah_id']);
        });

        Schema::table('jual_rumahs', function (Blueprint $table) {
            $table->dropForeign(['kasir_id']);
            $table->dropForeign(['marketing_id']);
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['rumah_id']);
            $table->dropForeign(['pencairan_dana_id']);
        });



    }
}
