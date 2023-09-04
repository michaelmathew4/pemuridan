<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataLembagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_lembagas', function (Blueprint $table) {
            $table->id();
            $table->text('data_lembaga');
            $table->string('id_user', 20);
            $table->date('tanggal_regist');
            $table->string('refrensi', 50)->nullable();
            $table->string('sapaan', 50)->nullable();
            $table->string('gelar_awalan', 50)->nullable();
            $table->text('nama_lengkap');
            $table->string('gelar_akhiran',50)->nullable();
            $table->string('nama_panggilan',50)->nullable();
            $table->string('peran', 50)->nullable();
            $table->string('jenis_identitas', 50)->nullable();
            $table->string('no_identitas', 20)->nullable();
            $table->text('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jK', 20)->nullable();
            $table->string('goldar', 5)->nullable();
            $table->string('status_pernikahan', 20)->nullable();
            $table->string('suku', 50)->nullable();
            $table->text('foto')->nullable();
            $table->text('foto_bitmap')->nullable();
            $table->text('alamat')->nullable();
            $table->text('ket_arah')->nullable();
            $table->text('peta')->nullable();
            $table->text('negara')->nullable();
            $table->text('provinsi')->nullable();
            $table->text('kota')->nullable();
            $table->text('kecamatan')->nullable();
            $table->text('kelurahan')->nullable();
            $table->string('kode_pos', 6)->nullable();
            $table->text('dusun')->nullable();
            $table->string('rt', 3)->nullable();
            $table->string('rw', 3)->nullable();
            $table->text('area')->nullable();
            $table->text('lokasi');
            $table->string('no_telp', 15)->nullable();
            $table->string('no_rumah', 3)->nullable();
            $table->string('no_hpsatu', 15)->nullable();
            $table->string('bisa_sms', 5)->nullable();
            $table->string('no_hpdua', 15)->nullable();
            $table->string('no_lainnya', 15)->nullable();
            $table->string('fax_rumah', 10)->nullable();
            $table->string('alamat_surel', 50)->nullable();
            $table->string('bisa_email', 5)->nullable();
            $table->text('website')->nullable();
            $table->string('pekerjaan', 50)->nullable();
            $table->string('jabatan', 50)->nullable();
            $table->string('status_pekerjaan', 50)->nullable();
            $table->string('nama_perusahaan', 70)->nullable();
            $table->text('sektor_industri')->nullable();
            $table->text('alamat_kantor')->nullable();
            $table->string('telp_kantor', 15)->nullable();
            $table->string('ext', 10)->nullable();
            $table->string('tingkat_pendidikan', 20)->nullable();
            $table->string('sekolah_univ', 50)->nullable();
            $table->text('bidang_ketertarikan')->nullable();
            $table->text('bidang_keterampilan')->nullable();
            $table->text('catatan')->nullable();
            $table->string('status', 15)->nullable();
            $table->string('verif_email', 10)->nullable();
            $table->string('no_rekening', 10)->nullable();
            $table->string('periode_beasiswa', 30)->nullable();
            $table->string('periode_kerja_praktiK', 30)->nullable();
            $table->text('riwayat_pelayananSatu')->nullable();
            $table->text('riwayat_pelayananDua')->nullable();
            $table->text('riwayat_pelayananTiga')->nullable();
            $table->text('riwayat_pelayananEmpat')->nullable();
            $table->text('riwayat_pelayananLima')->nullable();
            $table->text('riwayat_pelayananEnam')->nullable();
            $table->text('riwayat_pelayananTujuh')->nullable();
            $table->text('riwayat_pelayananDelapan')->nullable();
            $table->text('riwayat_pelayananSembilan')->nullable();
            $table->text('riwayat_pelayananSepuluh')->nullable();
            $table->string('kolom_cadanganPSatu', 50)->nullable();
            $table->string('kolom_cadanganPDua', 50)->nullable();
            $table->string('kolom_cadanganPTiga', 50)->nullable();
            $table->string('kolom_cadanganPEmpat', 50)->nullable();
            $table->string('kolom_cadanganPLima', 50)->nullable();
            $table->string('kolom_cadanganPEnam', 50)->nullable();
            $table->string('kolom_cadanganPTujuh', 50)->nullable();
            $table->text('personality_mbti')->nullable();
            $table->text('personality_holland')->nullable();
            $table->text('spiritual_gifts')->nullable();
            $table->text('abilities')->nullable();
            $table->text('experience')->nullable();
            $table->text('kemampuan_bahasa')->nullable();
            $table->string('kolom_cadanganCBSatu', 10)->nullable();
            $table->string('kolom_cadanganCBDua', 10)->nullable();
            $table->string('kolom_cadanganCBTiga', 10)->nullable();
            $table->string('kolom_cadanganCBEmpat', 10)->nullable();
            $table->string('kolom_cadanganCBLima', 10)->nullable();
            $table->string('kolom_cadanganCBEnam', 10)->nullable();
            $table->string('kolom_cadanganCBTujuh', 10)->nullable();
            $table->string('ba_sudah', 5)->nullable();
            $table->date('ba_tanggal')->nullable();
            $table->string('ba_tempat', 50)->nullable();
            $table->text('ba_file')->nullable();
            $table->text('ba_ket')->nullable();
            $table->string('menikah_sudah', 5)->nullable();
            $table->date('menikah_tanggal')->nullable();
            $table->string('menikah_tempat', 50)->nullable();
            $table->text('menikah_file')->nullable();
            $table->text('menikah_ket')->nullable();
            $table->string('bap_sudah', 5)->nullable();
            $table->date('bap_tanggal')->nullable();
            $table->text('bap_tempat', 50)->nullable();
            $table->text('bap_file')->nullable();
            $table->text('bap_ket')->nullable();
            $table->string('md_sudah', 5)->nullable();
            $table->date('md_tanggal')->nullable();
            $table->text('md_tempat', 50)->nullable();
            $table->text('md_file')->nullable();
            $table->text('md_ket')->nullable();
            $table->string('pa_sudah', 5)->nullable();
            $table->date('pa_tanggal')->nullable();
            $table->text('pa_tempat', 50)->nullable();
            $table->text('pa_file')->nullable();
            $table->text('pa_ket')->nullable();
            $table->string('ee_sudah', 5)->nullable();
            $table->date('ee_tanggal')->nullable();
            $table->text('ee_tempat', 50)->nullable();
            $table->text('ee_file')->nullable();
            $table->text('ee_ket')->nullable();
            $table->string('bid_sudah', 5)->nullable();
            $table->date('bid_tanggal')->nullable();
            $table->text('bid_tempat', 50)->nullable();
            $table->text('bid_file')->nullable();
            $table->text('bid_ket')->nullable();
            $table->string('pdt_sudah', 5)->nullable();
            $table->date('pdt_tanggal')->nullable();
            $table->text('pdt_tempat', 50)->nullable();
            $table->text('pdt_file')->nullable();
            $table->text('pdt_ket')->nullable();
            $table->string('kata_sandi', 50);
            $table->string('institusi', 50);
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
        Schema::dropIfExists('data_lembagas');
    }
}
