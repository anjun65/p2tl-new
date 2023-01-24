<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangBukti extends Model
{
    use HasFactory;

    protected $fillable = [
        'works_id',
        'nama_saksi',
        'alamat_saksi',
        'nomor_identitas',
        'no_telpon_saksi',
        'file_identitas',
        'jenis_kabel',
        'panjang_kabel',
        'tera',
        'terminal_kwh_meter',
        'box_ok',
        'box_app',
        'alat_pembatas',
        'alat_bantu_ukur',
        'file_barang_bukti',
    ];

    public function work()
    {
        return $this->belongsTo(WorkOrder::class, 'works_id', 'id');
    }
}
