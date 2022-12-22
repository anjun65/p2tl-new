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
            'nama_saksi' => ['required'],
            'alamat_saksi' => ['required'],
            'nomor_identitas' => ['required'],
            'file_nomor_identitas' => ['required','image','max:2048'],
            'no_telpon_saksi' => ['required'],
        ]);

        
        $form = FormLangsung::where('works_id', $request->works_id)->get();
        dd($form);
        
        if ($form->isEmpty()){
            $form = FormLangsung::create([
                'nama_saksi' => $request->nama_saksi,
                'alamat_saksi' => $request->alamat_saksi,
                'nomor_identitas' => $request->nomor_identitas,
                'file_nomor_identitas' => $request->file_nomor_identitas->store('assets/saksi', 'public'),
                'no_telpon_saksi' => $request->no_telpon_saksi,
            ]);

        } else {
            $form->nama_saksi = $request->nama_saksi;
            $form->alamat_saksi = $request->alamat_saksi;
            $form->nomor_identitas = $request->nomor_identitas;
            $form->file_nomor_identitas = $request->file_nomor_identitas;
            $form->no_telpon_saksi = $request->no_telpon_saksi;            
            $form->save();
        }
        
        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
