<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormLangsung;
use App\Helpers\ResponseFormatter;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FormLangsungController extends Controller
{

    public function show(Request $request)
    {
        $form_langsung = FormLangsung::with('data_lama', 'data_baru', 'kwh_meter', 'terminal', 'pelindungkwh', 'pelindung_busbar', 'papan_ok', 'penutup_mcb', 'pemeriksaan_pengukuran', 'wiring_app', 'hasil_pemeriksaan')
            ->where('works_id', $request->works_id)->get();

        if ($form_langsung)
            return ResponseFormatter::success(
                $form_langsung,
                'Data berhasil diambil'
            );
        else
            return ResponseFormatter::error(
                null,
                'Data tidak ada',
                404
            );
    }

    public function store(Request $request)
    {
        $request->validate([
            'works_id' => ['required'],
            'nama_saksi' => ['nullable'],
            'alamat_saksi' => ['nullable'],
            'nomor_identitas' => ['nullable'],
            'file' => ['nullable', 'image'],
            'no_telpon_saksi' => ['nullable'],
        ]);

        $form = FormLangsung::where('works_id', $request->works_id)->first();


        $new_file = null;

        if ($request->file) {
            $new_file = Storage::putFileAs('public/assets/saksi', $request->file, 'identitas_saksi_' . $request->nama_saksi . '|' . $request->identitas_saksi . '.' . $request->file->getClientOriginalExtension());
        }

        if (empty($form)) {
            $form = FormLangsung::create([
                'works_id' => $request->works_id,
                'nama_saksi' => $request->nama_saksi,
                'alamat_saksi' => $request->alamat_saksi,
                'nomor_identitas' => $request->nomor_identitas,
                // 'file' => $request->file_nomor_identitas->store('assets/saksi', 'public'),
                'file_nomor_identitas' => $new_file,
                'no_telpon_saksi' => $request->no_telpon_saksi,
            ]);
        } else {
            $form->works_id = $request->works_id;
            $form->nama_saksi = $request->nama_saksi ?? $form->nama_saksi;
            $form->alamat_saksi = $request->alamat_saksi ?? $form->alamat_saksi;
            $form->nomor_identitas = $request->nomor_identitas ?? $form->nomor_identitas;
            $form->file_nomor_identitas = $new_file ?? $form->file_nomor_identitas;
            $form->no_telpon_saksi = $request->no_telpon_saksi ?? $form->nomor_identitas;
            $form->save();
        }

        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }


    // public function updateIdentitas(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'file' => 'required|image|max:2048',
    //     ]);

    //     if ($validator->fails()) {
    //         return ResponseFormatter::error(['error'=>$validator->errors()], 'Update Fails', 401);
    //     }

    //     if ($request->file('file')) {

    //         $file = Storage::putFileAs('public/assets/saksi', $request->file, 'identitas_saksi_'.$request->nama_saksi.'.'.$request->file->getClientOriginalExtension());

    //         //store your file into database
    //         $user->profile_photo_path = $file;
    //         $user->update();

    //         return ResponseFormatter::success([$file],'File successfully uploaded');
    //     }
    // }
}
