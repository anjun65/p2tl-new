<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormTidakLangsungDataPemeriksaanBoxAmr extends Model
{
    use HasFactory;

    protected $fillable = [
        'forms_id',
        'peralatan',
        'segel',
        'nomor_tahun_kode_segel',
        'keterangan',
        'foto_sebelum',
        'post_peralatan',
        'post_segel',
        'post_nomor_tahun_kode_segel',
        'foto_sesudah',
    ];
}
