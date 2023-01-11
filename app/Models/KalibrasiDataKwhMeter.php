<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalibrasiDataKwhMeter extends Model
{
    use HasFactory;

    protected $fillable = [
        'forms_id',
        'merk',
        'no_register',
        'no_seri',
        'tahun_pembuatan',
        'class',
        'konstanta',
        'rating_arus',
        'tegangan_nominal',
        'stand_kwh_meter',
        'keterangan',
        'file',
    ];
}
