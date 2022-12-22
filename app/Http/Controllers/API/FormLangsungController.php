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
        
        if ($form){
            $form->update([
                'nama_saksi' => $request->nama_saksi,
                'alamat_saksi' => $request->alamat_saksi,
                'nomor_identitas' => $request->nomor_identitas,
                'file_nomor_identitas' => $request->file_nomor_identitas,
                'no_telpon_saksi' => $request->no_telpon_saksi,
            ]);
        } else {
            $form = FormLangsung::create([
                'nama_saksi' => $request->nama_saksi,
                'alamat_saksi' => $request->alamat_saksi,
                'nomor_identitas' => $request->nomor_identitas,
                'file_nomor_identitas' => $request->file_nomor_identitas->store('assets/saksi', 'public'),
                'no_telpon_saksi' => $request->no_telpon_saksi,
            ]);
        }
        
        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
