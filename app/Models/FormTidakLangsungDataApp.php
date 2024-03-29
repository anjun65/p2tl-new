<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormTidakLangsungDataApp extends Model
{
    use HasFactory;

    protected $fillable = [
        'forms_id',
        'merk',
        'no_seri',
        'rating_arus',
        'kwh_merk',
        'kwh_no_reg',
        'kwh_no_seri',
        'kwh_tahun_buat',
        'kwh_konstanta',
        'kwh_class',
        'kwh_rating_arus',
        'kwh_tegangan_nominal',
        'kwh_stand_mtr_lbp',
        'kwh_stand_mtr_bp',
        'kwh_stand_total',
        'kwh_stand_kvarh',
        'ct_merk',
        'ct_cls',
        'ct_rasio',
        'ct_burden',
        'pt_merk',
        'pt_cls',
        'pt_rasio',
        'pt_burden',
        'file_alat_pembatas',
        'file_kwh_meter',
        'file_trafo_arus',
        'file_trafo_tegangan',
        'file_kubikel',
        'file_box_app',
        'data_tegangan_tersambung',
        'data_jenis_pengukuran',
        'data_tempat_kedudukan',
        'kubikel_merk',
        'kubikel_type',
        'kubikel_no_seri',
        'kubikel_tahun',
        'box_app_merk',
        'box_app_type',
        'box_app_no_seri',
        'box_app_tahun',
    ];
}
