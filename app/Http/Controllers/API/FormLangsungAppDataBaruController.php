<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormLangsungDataAppBaru;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FormLangsungAppDataBaruController extends Controller
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
            'foto_kwh_meter' => ['required','image'],
            'jenis_pembatas' => ['required'],
            'alat_pembatas_merk' => ['required'],
            'rating_arus_2' => ['required'],
            'foto_pembatas' => ['required','image'],
        ]);

        
        $form = FormLangsungDataAppBaru::where('forms_id', $request->forms_id)->first();
        
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
                'foto_kwh_meter' => Storage::putFileAs('public/assets/dataAppBaru/kwh', $request->foto_kwh_meter, 'foto_kwh_meter_'.$request->forms_id.'.'.$request->foto_kwh_meter->getClientOriginalExtension()),
                'jenis_pembatas' => $request->jenis_pembatas,
                'alat_pembatas_merk' => $request->alat_pembatas_merk,
                'rating_arus_2' => $request->rating_arus_2,
                'foto_pembatas' => Storage::putFileAs('public/assets/dataAppBaru/pembatas', $request->foto_pembatas, 'fotopembatas_'.$request->forms_id.'.'.$request->foto_pembatas->getClientOriginalExtension()),
            ]);
        } else {
            $form = FormLangsungDataAppBaru::create([
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
                'foto_kwh_meter' => Storage::putFileAs('public/assets/dataAppBaru/kwh', $request->foto_kwh_meter, 'foto_kwh_meter'.$request->forms_id.'.'.$request->foto_kwh_meter->getClientOriginalExtension()),
                'jenis_pembatas' => $request->jenis_pembatas,
                'alat_pembatas_merk' => $request->alat_pembatas_merk,
                'rating_arus_2' => $request->rating_arus_2,
                'foto_pembatas' => Storage::putFileAs('public/assets/dataAppBaru/pembatas', $request->foto_pembatas, 'fotopembatas_'.$request->forms_id.'.'.$request->foto_pembatas->getClientOriginalExtension()),
            ]);
        }
        

        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
