<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormTidakLangsung extends Model
{
    use HasFactory;

    protected $fillable = [
        'works_id',
        'regus_id',
        'nama_saksi',
        'alamat_saksi',
        'nomor_identitas',
        'pekerjaan',
        'file_nomor_identitas',
        'no_telpon_saksi',
    ];


    public function work()
    {
        return $this->belongsTo(WorkOrder::class, 'works_id', 'id');
    }

    public function data_app()
    {
        return $this->hasOne(FormTidakLangsungDataApp::class, 'forms_id', 'id');
    }

    public function pelindung_kwh()
    {
        return $this->hasOne(FormTidakLangsungDataPemeriksaanPelindungKwh::class, 'forms_id', 'id');
    }

    public function pelindung_ct()
    {
        return $this->hasOne(FormTidakLangsungDataPemeriksaanPelindungCt::class, 'forms_id', 'id');
    }

    public function segel()
    {
        return $this->hasOne(FormTidakLangsungDataPemeriksaanSegelMetrologi::class, 'forms_id', 'id');
    }

    public function terminal()
    {
        return $this->hasOne(FormTidakLangsungDataPemeriksaanTutupTerminal::class, 'forms_id', 'id');
    }

    public function amr()
    {
        return $this->hasOne(FormTidakLangsungDataPemeriksaanBoxAmr::class, 'forms_id', 'id');
    }

    public function kubikel()
    {
        return $this->hasOne(FormTidakLangsungDataPemeriksaanKubikel::class, 'forms_id', 'id');
    }

    public function terminal_ct()
    {
        return $this->hasOne(FormTidakLangsungDataPemeriksaanTerminalCt::class, 'forms_id', 'id');
    }

    public function pintu_gardu()
    {
        return $this->hasOne(FormTidakLangsungDataPemeriksaanPintuGardu::class, 'forms_id', 'id');
    }


    public function pemeriksaan_pengukuran()
    {
        return $this->hasOne(FormTidakLangsungPemeriksaanPengukuran::class, 'forms_id', 'id');
    }

    public function wiring_app()
    {
        return $this->hasOne(FormTidakLangsungWiringApp::class, 'forms_id', 'id');
    }

    public function hasil_pemeriksaan()
    {
        return $this->hasOne(FormTidakLangsungHasilPemeriksaan::class, 'forms_id', 'id');
    }
}
