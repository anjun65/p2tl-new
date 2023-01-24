<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalibrasiKwhMeter extends Model
{
    use HasFactory;


    protected $fillable = [
        'works_id',
        'nama_saksi',
        'alamat_saksi',
        'nomor_identitas_saksi',
        'pekerjaan_saksi',
        'no_telp_saksi',
        'file',
    ];

    public function data_kwh()
    {
        return $this->hasOne(KalibrasiDataKwhMeter::class, 'forms_id', 'id');
    }
    public function data_kwh_lanjutan()
    {
        return $this->hasOne(KalibrasiDataKwhMeterLanjutan::class, 'forms_id', 'id');
    }

    public function data_uji_akurasi()
    {
        return $this->hasOne(KalibrasiUjiAkurasi::class, 'forms_id', 'id');
    }
}
