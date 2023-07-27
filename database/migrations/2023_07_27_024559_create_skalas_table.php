<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skalas', function (Blueprint $table) {
            $table->id();
            $table->string('skala', 10);
            $table->text('keterangan');
            $table->string('id_peserta', 10);
            $table->date('tgl_kontak');
            $table->string('status', 15);
            $table->timestamps();
            
            // $table->foreign('id_peserta')->references('id_peserta')->on('pesertas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skalas');
    }
}
