<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormTidakLangsungDataPemeriksaanPelindungKwh as form_model;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FormTidakLangsungDataPemeriksaanPelindungKwhController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'forms_id' => ['required'],
            'peralatan' => ['required'],
            'segel' => ['required'],
            'nomor_tahun_kode_segel' => ['required'],
            'keterangan' => ['required'],
            'foto_sebelum' => ['required','image'],
            'post_peralatan' => ['required'],
            'post_segel' => ['required'],
            'post_nomor_tahun_kode_segel' => ['required'],
            'foto_sesudah' => ['required','image'],
        ]);


        $form = form_model::where('forms_id', $request->forms_id)->first();
        
        $new_foto_sebelum = '';
        $new_foto_sesudah = '';

        if ($request->foto_sebelum){
            $new_foto_sebelum = Storage::putFileAs('public/assets/form-tidak-langsung/dataPemeriksaan/pelindungkwh/sebelum', $request->foto_sebelum, 'foto_sebelum_'.$request->forms_id.'.'.$request->foto_sebelum->getClientOriginalExtension());
        }

        if ($request->foto_sesudah){
            $new_foto_sesudah = Storage::putFileAs('public/assets/form-tidak-langsung/dataPemeriksaan/pelindungkwh/sebelum', $request->foto_sesudah, 'foto_sesudah_'.$request->forms_id.'.'.$request->foto_sesudah->getClientOriginalExtension());
        }
        
        if ($form){
            $form->update([
                'forms_id' => $request->forms_id,
                'peralatan' => $request->peralatan,
                'segel' => $request->segel,
                'nomor_tahun_kode_segel' => $request->nomor_tahun_kode_segel,
                'keterangan' => $request->keterangan,
                'foto_sebelum' => $new_foto_sebelum,
                'post_peralatan' => $request->post_peralatan,
                'post_segel' => $request->post_segel,
                'post_nomor_tahun_kode_segel' => $request->post_nomor_tahun_kode_segel,
                'foto_sesudah' => $new_foto_sesudah,
            ]);
        } else {
            $form = form_model::create([
                'forms_id' => $request->forms_id,
                'peralatan' => $request->peralatan,
                'segel' => $request->segel,
                'nomor_tahun_kode_segel' => $request->nomor_tahun_kode_segel,
                'keterangan' => $request->keterangan,
                'foto_sebelum' => $new_foto_sebelum,
                'post_peralatan' => $request->post_peralatan,
                'post_segel' => $request->post_segel,
                'post_nomor_tahun_kode_segel' => $request->post_nomor_tahun_kode_segel,
                'foto_sesudah' => $new_foto_sesudah,
            ]);
        }
        

        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
