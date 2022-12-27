<?php

namespace App\Models;

use App\Http\Controllers\API\FormLangsungPemeriksaanPelindungKwh;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormLangsung extends Model
{
    use HasFactory;

    protected $fillable = [
        'works_id',
        'regus_id',
        'no_ba',
        'surat_tugas_p2tl',
        'tanggal_surat_tugas_p2tl',
        'lembaga',
        'surat_tugas_tni',
        'tanggal_surat_tugas_tni',
        'nama_tni',
        'nip_tni',
        'jabatan_tni',
        'nama_saksi',
        'alamat_saksi',
        'nomor_identitas',
        'file_nomor_identitas',
        'no_telpon_saksi',
    ];

    public function data_lama()
    {
        return $this->hasOne(FormLangsungDataAppLama::class, 'forms_id', 'id');
    }

    public function data_baru()
    {
        return $this->hasOne(FormLangsungDataAppBaru::class, 'forms_id', 'id');
    }

    public function kwh_meter()
    {
        return $this->hasOne(FormLangsungPemeriksaanKwhMeter::class, 'forms_id', 'id');
    }
    
    public function terminal()
    {
        return $this->hasOne(FormLangsungPemeriksaanTerminal::class, 'forms_id', 'id');
    }

    public function pelindung_kwh()
    {
        return $this->hasOne(FormLangsungPemeriksaanPelindungKwh::class, 'forms_id', 'id');
    }

    public function pelindung_busbar()
    {
        return $this->hasOne(FormLangsungPemeriksaanPelindungBusBar::class, 'forms_id', 'id');
    }

    public function papan_ok()
    {
        return $this->hasOne(FormLangsungPemeriksaanPapanOk::class, 'forms_id', 'id');
    }

    public function penutup_mcb()
    {
        return $this->hasOne(FormLangsungPemeriksaanPenutupMcb::class, 'forms_id', 'id');
    }

    public function pemeriksaan_pengukuran()
    {
        return $this->hasOne(FormLangsungPemeriksaanPengukuran::class, 'forms_id', 'id');
    }

    public function wiring_app()
    {
        return $this->hasOne(FormLangsungPemeriksaanWiringApp::class, 'forms_id', 'id');
    }

    public function hasil_pemeriksaan()
    {
        return $this->hasOne(FormLangsungHasilPemeriksaan::class, 'forms_id', 'id');
    }
}
