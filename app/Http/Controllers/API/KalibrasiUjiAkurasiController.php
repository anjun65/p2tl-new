<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KalibrasiUjiAkurasi as form_model;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ResponseFormatter;

class KalibrasiUjiAkurasiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'forms_id' => ['required'],
            'beban_100_tegangan' => ['required'],
            'beban_100_arus' => ['required'],
            'beban_100_akurasi' => ['required'],
            'beban_100_keterangan' => ['required'],
            'beban_50_tegangan' => ['required'],
            'beban_50_arus' => ['required'],
            'beban_50_akurasi' => ['required'],
            'beban_50_keterangan' => ['required'],
            'beban_5_tegangan' => ['required'],
            'beban_5_arus' => ['required'],
            'beban_5_akurasi' => ['required'],
            'beban_5_keterangan' => ['required'],
            'alat_uji_merk' => ['required'],
            'alat_uji_type' => ['required'],
            'alat_uji_no_seri' => ['required'],
            'kesimpulan' => ['required'],
            'file' => ['required', 'video'],
        ]);

        $form = form_model::where('forms_id', $request->forms_id)->first();

        $new_file = '';

        if ($request->file) {
            $new_file = Storage::putFileAs('public/assets/kalibrasi/uji', $request->file, 'video_' . $request->forms_id . '.' . $request->file->getClientOriginalExtension());
        }

        if ($form) {
            $form->update([
                'forms_id' => $request->forms_id,
                'beban_100_tegangan' => $request->beban_100_tegangan,
                'beban_100_arus' => $request->beban_100_arus,
                'beban_100_akurasi' => $request->beban_100_akurasi,
                'beban_100_keterangan' => $request->beban_100_keterangan,
                'beban_50_tegangan' => $request->beban_50_tegangan,
                'beban_50_arus' => $request->beban_50_arus,
                'beban_50_akurasi' => $request->beban_50_akurasi,
                'beban_50_keterangan' => $request->beban_50_keterangan,
                'beban_5_tegangan' => $request->beban_5_tegangan,
                'beban_5_arus' => $request->beban_5_arus,
                'beban_5_akurasi' => $request->beban_5_akurasi,
                'beban_5_keterangan' => $request->beban_5_keterangan,
                'alat_uji_merk' => $request->alat_uji_merk,
                'alat_uji_type' => $request->alat_uji_type,
                'alat_uji_no_seri' => $request->alat_uji_no_seri,
                'kesimpulan' => $request->kesimpulan,
                'file' => $new_file,
            ]);
        } else {
            $form = form_model::create([
                'forms_id' => $request->forms_id,
                'beban_100_tegangan' => $request->beban_100_tegangan,
                'beban_100_arus' => $request->beban_100_arus,
                'beban_100_akurasi' => $request->beban_100_akurasi,
                'beban_100_keterangan' => $request->beban_100_keterangan,
                'beban_50_tegangan' => $request->beban_50_tegangan,
                'beban_50_arus' => $request->beban_50_arus,
                'beban_50_akurasi' => $request->beban_50_akurasi,
                'beban_50_keterangan' => $request->beban_50_keterangan,
                'beban_5_tegangan' => $request->beban_5_tegangan,
                'beban_5_arus' => $request->beban_5_arus,
                'beban_5_akurasi' => $request->beban_5_akurasi,
                'beban_5_keterangan' => $request->beban_5_keterangan,
                'alat_uji_merk' => $request->alat_uji_merk,
                'alat_uji_type' => $request->alat_uji_type,
                'alat_uji_no_seri' => $request->alat_uji_no_seri,
                'kesimpulan' => $request->kesimpulan,
                'file' => $new_file,
            ]);
        }


        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
