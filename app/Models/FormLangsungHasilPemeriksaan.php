<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormLangsungHasilPemeriksaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'forms_id',
        'hasil_pemeriksaan',
        'kesimpulan',
        'tindakan',
        'barang_bukti',
        'tanggal_penyelesaian',
    ];
            
}
