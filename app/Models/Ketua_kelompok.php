<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketua_kelompok extends Model
{
    use HasFactory;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
      'tanggal_registKK', 'refrensiKK', 'sapaanKK', 'gelar_awalanKK', 'nama_lengkapKK', 'gelar_akhiranKK', 'nama_panggilanKK', 'peranKK', 'jenis_identitasKK',
      'tempat_lahirKK', 'tanggal_lahirKK', 'jkKK', 'goldarKK', 'status_pernikahanKK', 'fotoKK', 'foto_bitmapKK', 'alamatKK','ket_arahKK', 'petaKK', 'negaraKK',
      'provinsiKK', 'kotaKK', 'kecamatanKK', 'kelurahanKK', 'kode_posKK', 'dusunKK', 'rtKK', 'rwKK', 'areaKK', 'no_telpKK', 'no_rumahKK', 'no_hpsatuKK', 'bisa_smsKK', 'no_hpduaKK',
      'no_lainnyaKK', 'fax_rumahKK', 'alamat_surelKK', 'bisa_emailKK', 'websiteKK', 'pekerjaanKK', 'jabatanKK', 'status_pekerjaanKK', 'nama_perusahaanKK', 'sektor_industriKK',
      'alamat_kantorKK', 'telp_kantorKK', 'extKK', 'tingkat_pendidikanKK', 'sekolah_univKK', 'bidang_ketertarikanKK', 'bidang_keterampilanKK', 'catatanKK', 'statusKK',
      'verif_emailKK', 'no_rekeningKK', 'periode_beasiswaKK', 'periode_kerja_praktikKK', 'riwayat_pelayananSatuKK', 'riwayat_pelayananDuaKK', 'riwayat_pelayananTigaKK',
      'riwayat_pelayananEmpatKK', 'kolom_cadanganPSatuKK', 'kolom_cadanganPDuaKK', 'kolom_cadanganPTigaKK', 'kolom_cadanganPEmpatKK', 'kolom_cadanganPLimaKK',
      'kolom_cadanganPEnamKK', 'kolom_cadanganPTujuhKK', 'personality_mbtiKK', 'personality_hollandKK', 'spiritual_giftsKK', 'abilitiesKK', 'kolom_cadanganPGLimaKK',
      'kemampuan_bahasaKK', 'penyakitKK', 'kolom_cadanganCBSatuKK', 'kolom_cadanganCBDuaKK', 'kolom_cadanganCBTigaKK', 'kolom_cadanganCBEmpatKK', 'kolom_cadanganCBLimaKK',
      'kolom_cadanganCBEnamKK', 'kolom_cadanganCBTujuhKK', 'ba_sudahKK', 'ba_tanggalKK', 'ba_tempatKK', 'ba_fileKK', 'ba_ketKK', 'menikah_sudahKK', 'menikah_tanggalKK',
      'menikah_tempatKK', 'menikah_fileKK', 'menikah_ketKK', 'bap_sudahKK', 'bap_tanggalKK','bap_tempatKK', 'bap_fileKK', 'bap_ketKK', 'md_sudahKK', 'md_tanggalKK',
      'md_tempatKK', 'md_fileKK', 'md_ketKK', 'pa_sudahKK', 'pa_tanggalKK', 'pa_tempatKK', 'pa_fileKK', 'pa_ketKK', 'ee_sudahKK', 'ee_tanggalKK', 'ee_tempatKK', 'ee_fileKK',
      'ee_ketKK', 'bid_sudahKK', 'bid_tanggalKK', 'bid_tempatKK', 'bid_fileKK', 'bid_ketKK', 'pdt_sudahKK', 'pdt_tanggalKK', 'pdt_tempatKK', 'pdt_fileKK', 'pdt_ketKK',
      'nama_grupKK', 'jbt_grupKK', 'tgl_gabung_grupKK', 'catatan_masuk_grupKK', 'kata_sandiKK'
    ];
}
