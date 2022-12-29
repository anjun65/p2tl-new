<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormLangsungPemeriksaanPengukuran extends Model
{
    use HasFactory;

    protected $fillable = [
        'forms_id',
        'arus_1',
        'arus_2',
        'arus_3',
        'arus_netral',
        'voltase_netral_1',
        'voltase_netral_2',
        'voltase_netral_3',
        'voltase_phase_1',
        'voltase_phase_2',
        'voltase_phase_3',
        'cos_1',
        'cos_2',
        'cos_3',
        'akurasi',
        'foto_sebelum',
    ];
}
