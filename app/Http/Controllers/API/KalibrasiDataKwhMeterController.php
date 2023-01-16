<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KalibrasiDataKwhMeter as form_model;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ResponseFormatter;

class KalibrasiDataKwhMeterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'forms_id' => ['required'],
            'merk' => ['required'],
            'no_register' => ['required'],
            'no_seri' => ['required'],
            'tahun_pembuatan' => ['required'],
            'class' => ['required'],
            'konstanta' => ['required'],
            'rating_arus' => ['required'],
            'tegangan_nominal' => ['required'],
            'stand_kwh_meter' => ['required'],
            'keterangan' => ['required'],
            'file' => ['required', 'mimes:mp4,mov,ogg,qt'],
        ]);

        $form = form_model::where('forms_id', $request->forms_id)->first();

        $new_file = '';

        if ($request->file) {
            $new_file = Storage::putFileAs('public/assets/kalibrasi/datakwhmeter', $request->file, 'video_' . $request->forms_id . '.' . $request->file->getClientOriginalExtension());
        }

        if ($form) {
            $form->update([
                'forms_id' => $request->forms_id,
                'merk' => $request->merk,
                'no_register' => $request->no_register,
                'no_seri' => $request->no_seri,
                'tahun_pembuatan' => $request->tahun_pembuatan,
                'class' => $request->class,
                'konstanta' => $request->konstanta,
                'rating_arus' => $request->rating_arus,
                'tegangan_nominal' => $request->tegangan_nominal,
                'stand_kwh_meter' => $request->stand_kwh_meter,
                'keterangan' => $request->keterangan,
                'file' => $new_file,
            ]);
        } else {
            $form = form_model::create([
                'forms_id' => $request->forms_id,
                'merk' => $request->merk,
                'no_register' => $request->no_register,
                'no_seri' => $request->no_seri,
                'tahun_pembuatan' => $request->tahun_pembuatan,
                'class' => $request->class,
                'konstanta' => $request->konstanta,
                'rating_arus' => $request->rating_arus,
                'tegangan_nominal' => $request->tegangan_nominal,
                'stand_kwh_meter' => $request->stand_kwh_meter,
                'keterangan' => $request->keterangan,
                'file' => $new_file,
            ]);
        }


        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
