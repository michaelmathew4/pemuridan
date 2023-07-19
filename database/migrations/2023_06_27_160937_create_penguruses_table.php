<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengurusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penguruses', function (Blueprint $table) {
            $table->id();
            $table->string('namaPRS');
            $table->string('jkPRS');
            $table->text('alamatPRS');
            $table->string('nohpPRS', 15);
            $table->string('alamat_surelPRS');
            $table->string('nama_penggunaPRS');
            $table->string('kata_sandiPRS');
            $table->string('kepengurusanPRS');
            $table->string('fotoPRS')->nullable();
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
        Schema::dropIfExists('penguruses');
    }
}
