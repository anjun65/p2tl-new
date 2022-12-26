<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormLangsungPemeriksaanKwhMeter;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FormLangsungPemeriksaanKWHController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'forms_id' => ['required'],
            'peralatan' => ['required'],
            'segel' => ['required'],
            'nomor_tahun_kode_segel' => ['required'],
            'keterangan' => ['required'],
            'foto_sebelum' => ['required','image','max:2048'],
            'post_peralatan' => ['required'],
            'post_segel' => ['required'],
            'post_nomor_tahun_kode_segel' => ['required'],
            'post_keterangan' => ['required'],
            'foto_sesudah' => ['required','image','max:2048'],
        ]);
        
        $form = FormLangsungPemeriksaanKwhMeter::where('forms_id', $request->forms_id)->first();
        
        if ($form){
            $form->update([
                'forms_id' => $request->forms_id,
                'peralatan' => $request->peralatan,
                'segel' => $request->segel,
                'nomor_tahun_kode_segel' => $request->nomor_tahun_kode_segel,
                'keterangan' => $request->keterangan,

                'foto_sebelum' => Storage::putFileAs('public/assets/dataPemeriksaan/kwh/sebelum', $request->foto_sebelum, 'foto_sebelum_'.$request->forms_id.'.'.$request->foto_sebelum->getClientOriginalExtension()),
                'post_peralatan' => $request->jenis_pembatas,
                'post_segel' => $request->alat_pembatas_merk,
                'post_nomor_tahun_kode_segel' => $request->rating_arus_2,
                'foto_sesudah' => Storage::putFileAs('public/assets/dataPemeriksaan/kwh/sesudah', $request->foto_sesudah, 'foto_sesudah_'.$request->forms_id.'.'.$request->foto_sesudah->getClientOriginalExtension()),
            ]);
        } else {
            $form = FormLangsungPemeriksaanKwhMeter::create([
                
                'forms_id' => $request->forms_id,
                'peralatan' => $request->peralatan,
                'segel' => $request->segel,
                'nomor_tahun_kode_segel' => $request->nomor_tahun_kode_segel,
                'keterangan' => $request->keterangan,

                'foto_sebelum' => Storage::putFileAs('public/assets/dataPemeriksaan/kwh/sebelum', $request->foto_sebelum, 'foto_sebelum_'.$request->forms_id.'.'.$request->foto_sebelum->getClientOriginalExtension()),
                'post_peralatan' => $request->jenis_pembatas,
                'post_segel' => $request->alat_pembatas_merk,
                'post_nomor_tahun_kode_segel' => $request->rating_arus_2,
                'foto_sesudah' => Storage::putFileAs('public/assets/dataPemeriksaan/kwh/sesudah', $request->foto_sesudah, 'foto_sesudah_'.$request->forms_id.'.'.$request->foto_sesudah->getClientOriginalExtension()),
            ]);
        }
        

        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
