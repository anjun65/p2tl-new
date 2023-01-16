<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KalibrasiKwhMeter as form_model;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ResponseFormatter;

class KalibrasiKwhMeterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'works_id' => ['required'],
            'nama_saksi' => ['nullable'],
            'alamat_saksi' => ['nullable'],
            'nomor_identitas_saksi' => ['nullable'],
            'pekerjaan_saksi' => ['nullable'],
            'no_telp_saksi' => ['nullable'],
            'file' => ['nullable', 'image'],
        ]);

        $form = form_model::where('works_id', $request->works_id)->first();

        $new_file = '';

        if ($request->file) {
            $new_file = Storage::putFileAs('public/assets/kalibrasi/', $request->file, 'foto_saksi_' . $request->works_id . '.' . $request->file->getClientOriginalExtension());
        }

        if ($form) {
            $form->update([
                'works_id' => $request->works_id,
                'nama_saksi' => $request->nama_saksi,
                'alamat_saksi' => $request->alamat_saksi,
                'nomor_identitas_saksi' => $request->nomor_identitas_saksi,
                'pekerjaan_saksi' => $request->pekerjaan_saksi,
                'no_telp_saksi' => $request->no_telp_saksi,
                'file' => $new_file,
            ]);
        } else {
            $form = form_model::create([
                'works_id' => $request->works_id,
                'nama_saksi' => $request->nama_saksi,
                'alamat_saksi' => $request->alamat_saksi,
                'nomor_identitas_saksi' => $request->nomor_identitas_saksi,
                'pekerjaan_saksi' => $request->pekerjaan_saksi,
                'no_telp_saksi' => $request->no_telp_saksi,
                'file' => $new_file,
            ]);
        }


        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
