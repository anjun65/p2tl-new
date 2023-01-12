<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalibrasiKwhMeter extends Model
{
    use HasFactory;


    protected $fillable = [
        'works_id',
        'nama_saksi',
        'alamat_saksi',
        'nomor_identitas_saksi',
        'pekerjaan_saksi',
        'no_telp_saksi',
        'file',
    ];
}
