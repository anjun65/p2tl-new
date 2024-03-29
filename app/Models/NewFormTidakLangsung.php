<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewFormTidakLangsung extends Model
{
    use HasFactory;

    protected $fillable = [
        'works_id',
        'nama_saksi',
        'alamat_saksi',
        'nomor_identitas',
        'pekerjaan',
        'no_telpon_saksi',
        'file_nomor_identitas',
        'data_tegangan_tersambung',
        'data_jenis_pengukuran',
        'data_tempat_kedudukan',
        'pembatas_jenis',
        'pembatas_merk',
        'pembatas_rating_arus',
        'pembatas_foto_pembatas',
        'kwh_merk',
        'kwh_no_reg',
        'kwh_no_seri',
        'kwh_tahun',
        'kwh_konstanta',
        'kwh_class',
        'kwh_rating_arus',
        'kwh_tegangan',
        'kwh_lbp',
        'kwh_bp',
        'kwh_total',
        'kwh_kvarh',
        'kwh_foto',
        'ct_merk',
        'ct_cls',
        'ct_rasio',
        'ct_burden',
        'ct_foto',
        'pt_merk',
        'pt_cls',
        'pt_rasio',
        'pt_burden',
        'pt_foto',
        'kubikel_merk',
        'kubikel_type',
        'kubikel_no_seri',
        'kubikel_tahun',
        'kubikel_foto',
        'box_app_merk',
        'box_app_type',
        'box_app_no_seri',
        'box_app_tahun',
        'box_app_foto',
        'pelindung_kwh_peralatan',
        'pelindung_kwh_segel',
        'pelindung_kwh_nomor_tahun_kode_segel',
        'pelindung_kwh_keterangan',
        'pelindung_kwh_foto_sebelum',
        'pelindung_kwh_post_peralatan',
        'pelindung_kwh_post_segel',
        'pelindung_kwh_post_nomor_tahun_kode_segel',
        'pelindung_kwh_foto_sesudah',
        'pelindung_ct_peralatan',
        'pelindung_ct_segel',
        'pelindung_ct_nomor_tahun_kode_segel',
        'pelindung_ct_keterangan',
        'pelindung_ct_foto_sebelum',
        'pelindung_ct_post_peralatan',
        'pelindung_ct_post_segel',
        'pelindung_ct_post_nomor_tahun_kode_segel',
        'pelindung_ct_foto_sesudah',
        'segel_peralatan',
        'segel_segel',
        'segel_nomor_tahun_kode_segel',
        'segel_keterangan',
        'segel_foto_sebelum',
        'segel_post_peralatan',
        'segel_post_segel',
        'segel_post_nomor_tahun_kode_segel',
        'segel_foto_sesudah',
        'tutup_terminal_peralatan',
        'tutup_terminal_segel',
        'tutup_terminal_nomor_tahun_kode_segel',
        'tutup_terminal_keterangan',
        'tutup_terminal_foto_sebelum',
        'tutup_terminal_post_peralatan',
        'tutup_terminal_post_segel',
        'tutup_terminal_post_nomor_tahun_kode_segel',
        'tutup_terminal_foto_sesudah',
        'amr_peralatan',
        'amr_segel',
        'amr_nomor_tahun_kode_segel',
        'amr_keterangan',
        'amr_foto_sebelum',
        'amr_post_peralatan',
        'amr_post_segel',
        'amr_post_nomor_tahun_kode_segel',
        'amr_foto_sesudah',
        'terminal_vt_peralatan',
        'terminal_vt_segel',
        'terminal_vt_nomor_tahun_kode_segel',
        'terminal_vt_keterangan',
        'terminal_vt_foto_sebelum',
        'terminal_vt_post_peralatan',
        'terminal_vt_post_segel',
        'terminal_vt_post_nomor_tahun_kode_segel',
        'terminal_vt_foto_sesudah',
        'terminal_ct_peralatan',
        'terminal_ct_segel',
        'terminal_ct_nomor_tahun_kode_segel',
        'terminal_ct_keterangan',
        'terminal_ct_foto_sebelum',
        'terminal_ct_post_peralatan',
        'terminal_ct_post_segel',
        'terminal_ct_post_nomor_tahun_kode_segel',
        'terminal_ct_foto_sesudah',
        'pintu_peralatan',
        'pintu_segel',
        'pintu_nomor_tahun_kode_segel',
        'pintu_keterangan',
        'pintu_foto_sebelum',
        'pintu_post_peralatan',
        'pintu_post_segel',
        'pintu_post_nomor_tahun_kode_segel',
        'pintu_foto_sesudah',
        'pintu_keterangan_all',
        'wiring_terminal1',
        'wiring_terminal2',
        'wiring_terminal3',
        'wiring_terminal4',
        'wiring_terminal5',
        'wiring_terminal6',
        'wiring_terminal7',
        'wiring_terminal8',
        'wiring_terminal9',
        'wiring_terminal11',
        'wiring_grounding',
        'wiring_keterangan',
        'wiring_diagram',
        'wiring_foto',
        'pengukuran_arus_primer_r',
        'pengukuran_arus_primer_s',
        'pengukuran_arus_primer_t',
        'pengukuran_arus_sekunder_r',
        'pengukuran_arus_sekunder_s',
        'pengukuran_arus_sekunder_t',
        'pengukuran_ct_r',
        'pengukuran_ct_s',
        'pengukuran_ct_t',
        'pengukuran_akurasi_r',
        'pengukuran_akurasi_s',
        'pengukuran_akurasi_t',
        'pengukuran_voltase_primer_r',
        'pengukuran_voltase_primer_s',
        'pengukuran_voltase_primer_t',
        'pengukuran_voltase_sekunder_r',
        'pengukuran_voltase_sekunder_s',
        'pengukuran_voltase_sekunder_t',
        'pengukuran_cos_r',
        'pengukuran_cos_s',
        'pengukuran_cos_t',
        'pengukuran_akurasi',
        'pengukuran_keterangan',
        'pengukuran_foto',
        'akhir_hasil_pemeriksaan',
        'akhir_kesimpulan',
        'akhir_tindakan',
        'akhir_barang_bukti',
        'akhir_tanggal_penyelesaian',
        'akhir_foto_barang_bukti',
        'akhir_labor',
    ];
}
