<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\FormLangsungPemeriksaanPengukuran;
use Illuminate\Support\Facades\Storage;

class FormLangsungPemeriksaanPengukuranController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'forms_id' => ['required'],
            'arus_1' => ['required'],
            'arus_2' => ['required'],
            'arus_3' => ['required'],
            'arus_netral' => ['required'],
            'voltase_netral_1' => ['required'],
            'voltase_netral_2' => ['required'],
            'voltase_netral_3' => ['required'],
            'voltase_phase_1' => ['required'],
            'voltase_phase_2' => ['required'],
            'voltase_phase_3' => ['required'],
            'cos_1' => ['required'],
            'cos_2' => ['required'],
            'cos_3' => ['required'],
            'akurasi' => ['required'],
            'foto_sebelum' => ['required','image']
        ]);

        
        $form = FormLangsungPemeriksaanPengukuran::where('forms_id', $request->forms_id)->first();
        
        if ($form){
            $form->update([
                'forms_id' => $request->forms_id,
                'arus_1' => $request->arus_1,
                'arus_2' => $request->arus_2,
                'arus_3' => $request->arus_3,
                'arus_netral' => $request->arus_netral,
                'voltase_netral_1' => $request->voltase_netral_1,
                'voltase_netral_2' => $request->voltase_netral_2,
                'voltase_netral_3' => $request->voltase_netral_3,
                'voltase_phase_1' => $request->voltase_phase_1,
                'voltase_phase_2' => $request->voltase_phase_2,
                'voltase_phase_3' => $request->voltase_phase_3,
                'cos_1' => $request->cos_1,
                'cos_2' => $request->cos_2,
                'cos_3' => $request->cos_3,
                'akurasi' => $request->akurasi,
                'foto_sebelum' => Storage::putFileAs('public/assets/dataPengukuran', $request->foto_sebelum, 'foto_ukur_'.$request->forms_id.'.'.$request->foto_sebelum->getClientOriginalExtension()),
            ]);
        } else {
            $form = FormLangsungPemeriksaanPengukuran::create([
                'forms_id' => $request->forms_id,
                'arus_1' => $request->arus_1,
                'arus_2' => $request->arus_2,
                'arus_3' => $request->arus_3,
                'arus_netral' => $request->arus_netral,
                'voltase_netral_1' => $request->voltase_netral_1,
                'voltase_netral_2' => $request->voltase_netral_2,
                'voltase_netral_3' => $request->voltase_netral_3,
                'voltase_phase_1' => $request->voltase_phase_1,
                'voltase_phase_2' => $request->voltase_phase_2,
                'voltase_phase_3' => $request->voltase_phase_3,
                'cos_1' => $request->cos_1,
                'cos_2' => $request->cos_2,
                'cos_3' => $request->cos_3,
                'akurasi' => $request->akurasi,
                'foto_sebelum' => Storage::putFileAs('public/assets/dataPengukuran', $request->foto_sebelum, 'foto_ukur_'.$request->forms_id.'.'.$request->foto_sebelum->getClientOriginalExtension()),
            ]);
        }
        

        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
