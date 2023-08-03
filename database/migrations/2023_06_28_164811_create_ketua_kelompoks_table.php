<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKetuaKelompoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ketua_kelompoks', function (Blueprint $table) {
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->integer('id_user');
            $table->date('tanggal_registKK');
            $table->string('refrensiKK', 50)->nullable();
            $table->string('sapaanKK', 50)->nullable();
            $table->string('gelar_awalanKK', 50)->nullable();
            $table->text('nama_lengkapKK');
            $table->string('gelar_akhiranKK',50)->nullable();
            $table->string('nama_panggilanKK',50)->nullable();
            $table->string('peranKK', 50)->nullable();
            $table->string('jenis_identitasKK', 50)->nullable();
            $table->string('no_identitasKK', 20)->nullable();
            $table->text('tempat_lahirKK')->nullable();
            $table->date('tanggal_lahirKK')->nullable();
            $table->string('jkKK', 20)->nullable();
            $table->string('goldarKK', 5)->nullable();
            $table->string('status_pernikahanKK', 20)->nullable();
            $table->text('fotoKK')->nullable();
            $table->text('foto_bitmapKK')->nullable();
            $table->text('alamatKK')->nullable();
            $table->text('ket_arahKK')->nullable();
            $table->text('petaKK')->nullable();
            $table->text('negaraKK')->nullable();
            $table->text('provinsiKK')->nullable();
            $table->text('kotaKK')->nullable();
            $table->text('kecamatanKK')->nullable();
            $table->text('kelurahanKK')->nullable();
            $table->string('kode_posKK', 6)->nullable();
            $table->text('dusunKK')->nullable();
            $table->string('rtKK', 3)->nullable();
            $table->string('rwKK', 3)->nullable();
            $table->text('areaKK')->nullable();
            $table->text('lokasiKK');
            $table->string('no_telpKK', 15)->nullable();
            $table->string('no_rumahKK', 3)->nullable();
            $table->string('no_hpsatuKK', 15)->nullable();
            $table->string('bisa_smsKK', 5)->nullable();
            $table->string('no_hpduaKK', 15)->nullable();
            $table->string('no_lainnyaKK', 15)->nullable();
            $table->string('fax_rumahKK', 10)->nullable();
            $table->string('alamat_surelKK', 50)->nullable();
            $table->string('bisa_emailKK', 5)->nullable();
            $table->text('websiteKK')->nullable();
            $table->string('pekerjaanKK', 50)->nullable();
            $table->string('jabatanKK', 50)->nullable();
            $table->string('status_pekerjaanKK', 50)->nullable();
            $table->string('nama_perusahaanKK', 70)->nullable();
            $table->text('sektor_industriKK')->nullable();
            $table->text('alamat_kantorKK')->nullable();
            $table->string('telp_kantorKK', 15)->nullable();
            $table->string('extKK', 10)->nullable();
            $table->string('tingkat_pendidikanKK', 20)->nullable();
            $table->string('sekolah_univKK', 50)->nullable();
            $table->text('bidang_ketertarikanKK')->nullable();
            $table->text('bidang_keterampilanKK')->nullable();
            $table->text('catatanKK')->nullable();
            $table->string('statusKK', 15)->nullable();
            $table->string('verif_emailKK', 10)->nullable();
            $table->string('no_rekeningKK', 10)->nullable();
            $table->string('periode_beasiswaKK', 30)->nullable();
            $table->string('periode_kerja_praktikKK', 30)->nullable();
            $table->text('riwayat_pelayananSatuKK')->nullable();
            $table->text('riwayat_pelayananDuaKK')->nullable();
            $table->text('riwayat_pelayananTigaKK')->nullable();
            $table->text('riwayat_pelayananEmpatKK')->nullable();
            $table->string('kolom_cadanganPSatuKK', 50)->nullable();
            $table->string('kolom_cadanganPDuaKK', 50)->nullable();
            $table->string('kolom_cadanganPTigaKK', 50)->nullable();
            $table->string('kolom_cadanganPEmpatKK', 50)->nullable();
            $table->string('kolom_cadanganPLimaKK', 50)->nullable();
            $table->string('kolom_cadanganPEnamKK', 50)->nullable();
            $table->string('kolom_cadanganPTujuhKK', 50)->nullable();
            $table->text('personality_mbtiKK')->nullable();
            $table->text('personality_hollandKK')->nullable();
            $table->text('spiritual_giftsKK')->nullable();
            $table->text('abilitiesKK')->nullable();
            $table->text('kolom_cadanganPGLimaKK')->nullable();
            $table->text('kemampuan_bahasaKK')->nullable();
            $table->text('penyakitKK')->nullable();
            $table->string('kolom_cadanganCBSatuKK', 10)->nullable();
            $table->string('kolom_cadanganCBDuaKK', 10)->nullable();
            $table->string('kolom_cadanganCBTigaKK', 10)->nullable();
            $table->string('kolom_cadanganCBEmpatKK', 10)->nullable();
            $table->string('kolom_cadanganCBLimaKK', 10)->nullable();
            $table->string('kolom_cadanganCBEnamKK', 10)->nullable();
            $table->string('kolom_cadanganCBTujuhKK', 10)->nullable();
            $table->string('ba_sudahKK', 5)->nullable();
            $table->date('ba_tanggalKK')->nullable();
            $table->string('ba_tempatKK', 50)->nullable();
            $table->text('ba_fileKK')->nullable();
            $table->text('ba_ketKK')->nullable();
            $table->string('menikah_sudahKK', 5)->nullable();
            $table->date('menikah_tanggalKK')->nullable();
            $table->string('menikah_tempatKK', 50)->nullable();
            $table->text('menikah_fileKK')->nullable();
            $table->text('menikah_ketKK')->nullable();
            $table->string('bap_sudahKK', 5)->nullable();
            $table->date('bap_tanggalKK')->nullable();
            $table->text('bap_tempatKK', 50)->nullable();
            $table->text('bap_fileKK')->nullable();
            $table->text('bap_ketKK')->nullable();
            $table->string('md_sudahKK', 5)->nullable();
            $table->date('md_tanggalKK')->nullable();
            $table->text('md_tempatKK', 50)->nullable();
            $table->text('md_fileKK')->nullable();
            $table->text('md_ketKK')->nullable();
            $table->string('pa_sudahKK', 5)->nullable();
            $table->date('pa_tanggalKK')->nullable();
            $table->text('pa_tempatKK', 50)->nullable();
            $table->text('pa_fileKK')->nullable();
            $table->text('pa_ketKK')->nullable();
            $table->string('ee_sudahKK', 5)->nullable();
            $table->date('ee_tanggalKK')->nullable();
            $table->text('ee_tempatKK', 50)->nullable();
            $table->text('ee_fileKK')->nullable();
            $table->text('ee_ketKK')->nullable();
            $table->string('bid_sudahKK', 5)->nullable();
            $table->date('bid_tanggalKK')->nullable();
            $table->text('bid_tempatKK', 50)->nullable();
            $table->text('bid_fileKK')->nullable();
            $table->text('bid_ketKK')->nullable();
            $table->string('pdt_sudahKK', 5)->nullable();
            $table->date('pdt_tanggalKK')->nullable();
            $table->text('pdt_tempatKK', 50)->nullable();
            $table->text('pdt_fileKK')->nullable();
            $table->text('pdt_ketKK')->nullable();
            $table->string('nama_grupKK', 50)->nullable();
            $table->string('jbt_grupKK', 50)->nullable();
            $table->date('tgl_gabung_grupKK')->nullable();
            $table->text('catatan_masuk_grupKK')->nullable();
            $table->string('kata_sandiKK', 50);
            $table->string('institusiKK', 100);
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
        Schema::dropIfExists('ketua_kelompoks');
    }
}
