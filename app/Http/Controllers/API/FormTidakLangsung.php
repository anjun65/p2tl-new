<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormTidakLangsung as form_model;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Storage;

class FormTidakLangsung extends Controller
{
    public function show($id)
    {
        $form_langsung = form_model::with('data_lama','data_baru','kwh_meter','terminal', 'pelindungkwh' , 'pelindung_busbar', 'papan_ok', 'penutup_mcb', 'pemeriksaan_pengukuran', 'wiring_app', 'hasil_pemeriksaan')
            ->where('works_id', $id)->get();

        if($form_langsung)
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
            'nama_saksi' => ['nullable'],
            'alamat_saksi' => ['nullable'],
            'nomor_identitas' => ['nullable'],
            'pekerjaan' => ['nullable'],
            'no_telpon_saksi' => ['nullable'],
            'file' => ['nullable','image'],
        ]);

        $form = form_model::where('works_id', $request->works_id)->first();
        
        $new_file = '';

        if($request->file)
        {
            $new_file = Storage::putFileAs('public/assets/saksi', $request->file, 'identitas_saksi_'.$request->nama_saksi.'|'.$request->identitas_saksi.'.'.$request->file->getClientOriginalExtension());
        }


        if (empty($form)){
            $form = form_model::create([
                'works_id' => $request->works_id,
                'nama_saksi' => $request->nama_saksi,
                'alamat_saksi' => $request->alamat_saksi,
                'nomor_identitas' => $request->nomor_identitas,
                'pekerjaan' => $request->pekerjaan,
                // 'file' => $request->file_nomor_identitas->store('assets/saksi', 'public'),
                'file_nomor_identitas' => $new_file,
                'no_telpon_saksi' => $request->no_telpon_saksi,
            ]);
        } else {
            $form->works_id = $request->works_id;
            $form->nama_saksi = $request->nama_saksi;
            $form->alamat_saksi = $request->alamat_saksi;
            $form->nomor_identitas = $request->nomor_identitas;
            $form->pekerjaan = $request->pekerjaan;
            $form->file_nomor_identitas = Storage::putFileAs('public/assets/saksi', $request->file, 'identitas_saksiii_'.$request->nama_saksi.'.'.$request->file->getClientOriginalExtension());
            $form->no_telpon_saksi = $request->no_telpon_saksi;            
            $form->save();
        }
        
        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
