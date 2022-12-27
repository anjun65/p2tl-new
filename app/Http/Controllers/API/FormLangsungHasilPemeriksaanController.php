<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FormLangsungHasilPemeriksaan;

class FormLangsungHasilPemeriksaanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'forms_id'=> ['required'],
            'hasil_pemeriksaan'=> ['required'],
            'kesimpulan'=> ['required'],
            'tindakan'=> ['required'],
            'barang_bukti'=> ['required'],
            'tanggal_penyelesaian'=> ['required'],
        ]);

        
        $form = FormLangsungHasilPemeriksaan::where('forms_id', $request->forms_id)->first();
        
        if ($form){
            $form->update([
                'forms_id' =>$request->forms_id,
                'hasil_pemeriksaan' =>$request->hasil_pemeriksaan,
                'kesimpulan' =>$request->kesimpulan,
                'tindakan' =>$request->tindakan,
                'barang_bukti' =>$request->barang_bukti,
                'tanggal_penyelesaian' =>$request->tanggal_penyelesaian,
            ]);
        } else {
            $form = FormLangsungHasilPemeriksaan::create([
                'forms_id' =>$request->forms_id,
                'hasil_pemeriksaan' =>$request->hasil_pemeriksaan,
                'kesimpulan' =>$request->kesimpulan,
                'tindakan' =>$request->tindakan,
                'barang_bukti' =>$request->barang_bukti,
                'tanggal_penyelesaian' =>$request->tanggal_penyelesaian,
            ]);
        }
        

        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
