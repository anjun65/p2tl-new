<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FormLangsungHasilPemeriksaan;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ResponseFormatter;

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
            'tanggal_penyelesaian' => ['required'],
            'foto_barang_bukti' => ['nullable'],
        ]);

        
        $form = FormLangsungHasilPemeriksaan::where('forms_id', $request->forms_id)->first();
        

        if($request->foto_barang_bukti)
        {
            $foto = Storage::putFileAs('public/assets/barang-bukti/kwh', $request->foto_barang_bukti, 'foto_kwh_meter_'.$request->forms_id.'.'.$request->foto_barang_bukti->getClientOriginalExtension());
        }


        if ($form){
            $form->update([
                'forms_id' =>$request->forms_id,
                'hasil_pemeriksaan' =>$request->hasil_pemeriksaan,
                'kesimpulan' =>$request->kesimpulan,
                'tindakan' =>$request->tindakan,
                'barang_bukti' =>$request->barang_bukti,
                'tanggal_penyelesaian' =>$request->tanggal_penyelesaian,
                'foto_barang_bukti' => $foto,
            ]);
        } else {
            $form = FormLangsungHasilPemeriksaan::create([
                'forms_id' =>$request->forms_id,
                'hasil_pemeriksaan' =>$request->hasil_pemeriksaan,
                'kesimpulan' =>$request->kesimpulan,
                'tindakan' =>$request->tindakan,
                'barang_bukti' =>$request->barang_bukti,
                'tanggal_penyelesaian' =>$request->tanggal_penyelesaian,
                'foto_barang_bukti' => $foto,
            ]);
        }

        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
