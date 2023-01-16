<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KalibrasiDataKwhMeterLanjutan as form_model;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ResponseFormatter;

class KalibrasiDataKwhMeterLanjutanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'forms_id' => ['required'],
            'atas_a' => ['required'],
            'atas_b' => ['required'],
            'atas_keterangan' => ['required'],
            'kanan_a' => ['required'],
            'kanan_b' => ['required'],
            'kanan_keterangan' => ['required'],
            'kiri_a' => ['required'],
            'kiri_b' => ['required'],
            'kiri_keterangan' => ['required'],
            'file' => ['nullable', 'mimes:mp4,mov,ogg,qt'],
        ]);

        $form = form_model::where('forms_id', $request->forms_id)->first();

        $new_file = '';

        if ($request->file) {
            $new_file = Storage::putFileAs('public/assets/kalibrasi/posisi', $request->file, 'video_' . $request->forms_id . '.' . $request->file->getClientOriginalExtension());
        }

        if ($form) {
            $form->update([
                'forms_id' => $request->forms_id,
                'atas_a' => $request->atas_a,
                'atas_b' => $request->atas_b,
                'atas_keterangan' => $request->atas_keterangan,
                'kanan_a' => $request->kanan_a,
                'kanan_b' => $request->kanan_b,
                'kanan_keterangan' => $request->kanan_keterangan,
                'kiri_a' => $request->kiri_a,
                'kiri_b' => $request->kiri_b,
                'kiri_keterangan' => $request->kiri_keterangan,
                'file' => $new_file,
            ]);
        } else {
            $form = form_model::create([
                'forms_id' => $request->forms_id,
                'atas_a' => $request->atas_a,
                'atas_b' => $request->atas_b,
                'atas_keterangan' => $request->atas_keterangan,
                'kanan_a' => $request->kanan_a,
                'kanan_b' => $request->kanan_b,
                'kanan_keterangan' => $request->kanan_keterangan,
                'kiri_a' => $request->kiri_a,
                'kiri_b' => $request->kiri_b,
                'kiri_keterangan' => $request->kiri_keterangan,
                'file' => $new_file,
            ]);
        }


        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
