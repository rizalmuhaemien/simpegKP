<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nik_pegawai');
            $table->string('nama_pegawai');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('nama_instansi');
            $table->string('bagian_pegawai');
            $table->string('no_hp');
            $table->string('email')->unique();
            $table->text('alamat_pegawai');
            $table->string('foto_pegawai');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('pegawai');
    }
}
