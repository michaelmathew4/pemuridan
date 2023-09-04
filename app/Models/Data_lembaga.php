<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_lembaga extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
      'data_lembaga', 'id_user', 'tanggal_regist', 'refrensi', 'sapaan', 'gelar_awalan', 'nama_lengkap', 'gelar_akhiran', 'nama_panggilan', 'peran', 'jenis_identitas',
      'no_identitas', 'tempat_lahir', 'tanggal_lahir', 'jK', 'goldar', 'status_pernikahan', 'suku', 'foto', 'foto_bitmap', 'alamat','ket_arah', 'peta', 'negara',
      'provinsi', 'kota', 'kecamatan', 'kelurahan', 'kode_pos', 'dusun', 'rt', 'rw', 'area', 'lokasi','no_telp', 'no_rumah', 'no_hpsatu', 'bisa_sms', 'no_hpdua',
      'no_lainnya', 'fax_rumah', 'alamat_surel', 'bisa_email', 'website', 'pekerjaan', 'jabatan', 'status_pekerjaan', 'nama_perusahaan', 'sektor_industri',
      'alamat_kantor', 'telp_kantor', 'ext', 'tingkat_pendidikan', 'sekolah_univ', 'bidang_ketertarikan', 'bidang_keterampilan', 'catatan', 'status',
      'verif_email', 'no_rekening', 'periode_beasiswa', 'periode_kerja_praktiK', 'riwayat_pelayananSatu', 'riwayat_pelayananDua', 'riwayat_pelayananTiga',
      'riwayat_pelayananEmpat', 'riwayat_pelayananLima', 'riwayat_pelayananEnam', 'riwayat_pelayananTujuh', 'riwayat_pelayananDelapan', 'riwayat_pelayananSembilan',
      'riwayat_pelayananSepuluh', 'kolom_cadanganPSatu', 'kolom_cadanganPDua', 'kolom_cadanganPTiga', 'kolom_cadanganPEmpat', 'kolom_cadanganPLima',
      'kolom_cadanganPEnam', 'kolom_cadanganPTujuh', 'personality_mbti', 'personality_holland', 'spiritual_gifts', 'abilities', 'experience',
      'kemampuan_bahasa', 'kolom_cadanganCBSatu', 'kolom_cadanganCBDua', 'kolom_cadanganCBTiga', 'kolom_cadanganCBEmpat', 'kolom_cadanganCBLima',
      'kolom_cadanganCBEnam', 'kolom_cadanganCBTujuh', 'ba_sudah', 'ba_tanggal', 'ba_tempat', 'ba_file', 'ba_ket', 'menikah_sudah', 'menikah_tanggal',
      'menikah_tempat', 'menikah_file', 'menikah_ket', 'bap_sudah', 'bap_tanggal','bap_tempat', 'bap_file', 'bap_ket', 'md_sudah', 'md_tanggal',
      'md_tempat', 'md_file', 'md_ket', 'pa_sudah', 'pa_tanggal', 'pa_tempat', 'pa_file', 'pa_ket', 'ee_sudah', 'ee_tanggal', 'ee_tempat', 'ee_file',
      'ee_ket', 'bid_sudah', 'bid_tanggal', 'bid_tempat', 'bid_file', 'bid_ket', 'pdt_sudah', 'pdt_tanggal', 'pdt_tempat', 'pdt_file', 'pdt_ket',
      'kata_sandi', 'institusi'
    ];
}
