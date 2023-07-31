<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('namaADM');
            $table->string('jkADM', 10);
            $table->text('alamatADM');
            $table->string('nohpADM', 15)->nullable();
            $table->string('alamat_surelADM');
            $table->string('kata_sandiADM');
            $table->string('fotoADM')->nullable();
            $table->string('tingkatADM');
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
        Schema::dropIfExists('admins');
    }
}
