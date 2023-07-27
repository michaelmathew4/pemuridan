<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('id_peserta', 10);
            $table->string('nama_peserta', 50);
            $table->string('jk_peserta', 15);
            $table->string('tempat_lahir_peserta', 50);
            $table->date('tgl_lahir_peserta');
            $table->text('alamat_peserta');
            $table->string('no_hp_peserta', 15);
            $table->string('pekerjaan_peserta', 100);
            $table->string('suku_peserta', 50);
            $table->string('status_peserta', 25);
            $table->string('foto_peserta');
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
        Schema::dropIfExists('pesertas');
    }
}
