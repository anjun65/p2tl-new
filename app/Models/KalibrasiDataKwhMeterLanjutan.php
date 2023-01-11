<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalibrasiDataKwhMeterLanjutan extends Model
{
    use HasFactory;


    protected $fillable = [
        'forms_id',
        'atas_a',
        'atas_b',
        'atas_keterangan',
        'kanan_a',
        'kanan_b',
        'kanan_keterangan',
        'kiri_a',
        'kiri_b',
        'kiri_keterangan',
        'file',
    ];
}
