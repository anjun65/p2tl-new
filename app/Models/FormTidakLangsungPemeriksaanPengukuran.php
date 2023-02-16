<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormTidakLangsungPemeriksaanPengukuran extends Model
{
    use HasFactory;

    protected $fillable = [
        'forms_id',
        'arus_primer_r',
        'arus_primer_s',
        'arus_primer_t',
        'arus_sekunder_r',
        'arus_sekunder_s',
        'arus_sekunder_t',
        'ct_r',
        'ct_s',
        'ct_t',
        'akurasi_r',
        'akurasi_s',
        'akurasi_t',
        'voltase_primer_r',
        'voltase_primer_s',
        'voltase_primer_t',
        'voltase_sekunder_r',
        'voltase_sekunder_s',
        'voltase_sekunder_t',
        'cos_r',
        'cos_s',
        'cos_t',
        'akurasi',
        'keterangan',
        'foto',
    ];
}
