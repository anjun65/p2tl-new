<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormLangsung;
use App\Helpers\ResponseFormatter;

class FormLangsungController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'regus_id' => ['required'],
            'works_id' => ['required'],
            'no_ba' => ['required'],
            'surat_tugas_p2tl' => ['required'],
            'tanggal_surat_tugas_p2tl' => ['required'],
            'surat_tugas_tni' => ['required'],
            'tanggal_surat_tugas_tni' => ['required'],
            'nama_tni' => ['required'],
            'nip_tni' => ['required'],
            'jabatan_tni' => ['required'],
            'alamat_pelanggan' => ['required'],
            'tarif' => ['required'],
            'nama_saksi' => ['required'],
            'alamat_saksi' => ['required'],
            'nomor_identitas' => ['required'],
            'no_telpon_saksi' => ['required'],
        ]);

        
        $form = FormLangsung::where('works_id', $request->works_id)->get();
        
        if ($form){
            $form->update([
                'regus_id' => $request->regus_id,
                'works_id' => $request->works_id,
                'no_ba' => $request->no_ba,
                'surat_tugas_p2tl' => $request->surat_tugas_p2tl,
                'tanggal_surat_tugas_p2tl' => $request->tanggal_surat_tugas_p2tl,
                'surat_tugas_tni' => $request->surat_tugas_tni,
                'tanggal_surat_tugas_tni' => $request->tanggal_surat_tugas_tni,
                'nama_tni' => $request->nama_tni,
                'nip_tni' => $request->nip_tni,
                'jabatan_tni' => $request->jabatan_tni,
                'alamat_pelanggan' => $request->alamat_pelanggan,
                'tarif' => $request->tarif,
                'nama_saksi' => $request->nama_saksi,
                'alamat_saksi' => $request->alamat_saksi,
                'nomor_identitas' => $request->nomor_identitas,
                'no_telpon_saksi' => $request->no_telpon_saksi,
            ]);
        } else {
            $form = FormLangsung::create([
                'regus_id' => $request->regus_id,
                'works_id' => $request->works_id,
                'no_ba' => $request->no_ba,
                'surat_tugas_p2tl' => $request->surat_tugas_p2tl,
                'tanggal_surat_tugas_p2tl' => $request->tanggal_surat_tugas_p2tl,
                'surat_tugas_tni' => $request->surat_tugas_tni,
                'tanggal_surat_tugas_tni' => $request->tanggal_surat_tugas_tni,
                'nama_tni' => $request->nama_tni,
                'nip_tni' => $request->nip_tni,
                'jabatan_tni' => $request->jabatan_tni,
                'alamat_pelanggan' => $request->alamat_pelanggan,
                'tarif' => $request->tarif,
                'nama_saksi' => $request->nama_saksi,
                'alamat_saksi' => $request->alamat_saksi,
                'nomor_identitas' => $request->nomor_identitas,
                'no_telpon_saksi' => $request->no_telpon_saksi,
            ]);
        }
        

        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
