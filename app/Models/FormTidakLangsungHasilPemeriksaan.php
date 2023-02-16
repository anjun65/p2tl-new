<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormTidakLangsungHasilPemeriksaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'hasil_pemeriksaan',
        'kesimpulan',
        'tindakan',
        'barang_bukti',
        'tanggal_penyelesaian',
        'foto_barang_bukti',
    ];
}