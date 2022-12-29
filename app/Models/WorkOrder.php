<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pelanggan',
        'nama_pelanggan',
        'latitude',
        'longitude',
        'alamat',
        'jenis_p2tl',
        'tarif',
        'daya',
        'rbm',
        'lgkh',
        'fkm',
        'regus_id',
        'keterangan_p2tl',
        'status',
        'no_ba',
        'surat_tugas_p2tl',
        'tanggal_surat_tugas_p2tl',
        'surat_tugas_tni',
        'tanggal_surat_tugas_tni',
        'pendamping1_id',
        'pendamping2_id',
        'tanggal_inspeksi',
        'jumlah_ts_rp',
        'jumlah_ts_kwh',
    ];

    const Keterangan = [
        'BA' => 'Pemeriksaan Dengan BA',
        'RK' => 'Rumah Kosong/Bangunan tidak dihuni',
        'TO' => 'Tidak ada Orang',
    ];

    const Status = [
        'Open' => 'Open',
        'Close' => 'Close',
    ];

    const JenisP2TL = [
        '1L' => '1L',
        '3L' => '3L',
        '3TL' => '3TL',
    ];

    public function jam_nyala()
    {
        return $this->hasMany(WorkOrder::class, 'works_id', 'id');
    }

    public function regu()
    {
        return $this->belongsTo(Regu::class, 'regus_id', 'id');
    }
}
