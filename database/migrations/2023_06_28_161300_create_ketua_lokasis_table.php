<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKetuaLokasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ketua_lokasis', function (Blueprint $table) {
            $table->id();
            $table->string('namaKL');
            $table->string('jkKL');
            $table->text('alamatKL');
            $table->string('nohpKL', 15);
            $table->string('alamat_surelKL');
            $table->string('nama_penggunaKL');
            $table->string('kata_sandiKL');
            $table->string('lokasiKL');
            $table->string('fotoKL')->nullable();
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
        Schema::dropIfExists('ketua_lokasis');
    }
}
