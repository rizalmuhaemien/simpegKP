<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKgb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kgb', function (Blueprint $table) {
            $table->id();
            $table->string('pegawai');
            $table->string('nomor');
            $table->date('tgl_masuk');
            $table->string('gaji_lama');
            $table->string('gaji_baru');
            $table->string('golongan');
            $table->date('tgl_terhitung');
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
        Schema::dropIfExists('kgb');
    }
}
