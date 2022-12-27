<?php

namespace App\Models;

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

    
}
