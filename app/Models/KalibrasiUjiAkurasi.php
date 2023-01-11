<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalibrasiUjiAkurasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'forms_id',
        'beban_100_tegangan',
        'beban_100_arus',
        'beban_100_akurasi',
        'beban_100_keterangan',
        'beban_50_tegangan',
        'beban_50_arus',
        'beban_50_akurasi',
        'beban_50_keterangan',
        'beban_5_tegangan',
        'beban_5_arus',
        'beban_5_akurasi',
        'beban_5_keterangan',
        'alat_uji_merk',
        'alat_uji_type',
        'alat_uji_no_seri',
        'kesimpulan',
        'file',
    ];
}
