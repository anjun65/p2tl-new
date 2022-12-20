<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormLangsungDataAppLama;
use App\Helpers\ResponseFormatter;

class FormLangsungAppDataLamaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'forms_id' => ['required'],
            'merk' => ['required'],
            'no_reg' => ['required'],
            'no_seri' => ['required'],
            'tahun_pembuatan' => ['required'],
            'class' => ['required'],
            'konstanta' => ['required'],
            'rating_arus' => ['required'],
            'tegangan_nominal' => ['required'],
            'stand_kwh_meter' => ['required'],
            'jenis_pembatas' => ['required'],
            'alat_pembatas_merk' => ['required'],
            'rating_arus_2' => ['required'],
            'regus_id' => ['required'],
        ]);

        
        $form = FormLangsungDataAppLama::where('forms_id', $request->forms_id)->get();
        
        if ($form){
            $form->update([
                'forms_id' => $request->forms_id,
                'merk' => $request->merk,
                'no_reg' => $request->no_reg,
                'no_seri' => $request->no_seri,
                'tahun_pembuatan' => $request->tahun_pembuatan,
                'class' => $request->class,
                'konstanta' => $request->konstanta,
                'rating_arus' => $request->rating_arus,
                'tegangan_nominal' => $request->tegangan_nominal,
                'stand_kwh_meter' => $request->stand_kwh_meter,
                'jenis_pembatas' => $request->jenis_pembatas,
                'alat_pembatas_merk' => $request->alat_pembatas_merk,
                'rating_arus_2' => $request->rating_arus_2,
            ]);
        } else {
            $form = FormLangsungDataAppLama::create([
                'forms_id' => $request->forms_id,
                'merk' => $request->merk,
                'no_reg' => $request->no_reg,
                'no_seri' => $request->no_seri,
                'tahun_pembuatan' => $request->tahun_pembuatan,
                'class' => $request->class,
                'konstanta' => $request->konstanta,
                'rating_arus' => $request->rating_arus,
                'tegangan_nominal' => $request->tegangan_nominal,
                'stand_kwh_meter' => $request->stand_kwh_meter,
                'jenis_pembatas' => $request->jenis_pembatas,
                'alat_pembatas_merk' => $request->alat_pembatas_merk,
                'rating_arus_2' => $request->rating_arus_2,
            ]);
        }
        

        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
