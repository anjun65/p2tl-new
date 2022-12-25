<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormLangsungDataAppLama extends Model
{
    use HasFactory;

    protected $fillable = [
        'forms_id',
        'merk',
        'no_reg',
        'no_seri',
        'tahun_pembuatan',
        'class',
        'konstanta',
        'rating_arus',
        'tegangan_nominal',
        'stand_kwh_meter',
        'foto_kwh_meter',
        'rating_arus_2',
        'jenis_pembatas',
        'alat_pembatas_merk',
        'foto_pembatas',
    ];
}
