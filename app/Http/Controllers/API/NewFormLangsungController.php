<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\FormLangsung;

class NewFormLangsungController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'works_id' => ['required'],
            'nama_saksi' => ['nullable'],
            'alamat_saksi' => ['nullable'],
            'nomor_identitas' => ['nullable'],
            'no_telpon_saksi' => ['nullable'],
            'file_nomor_identitas' => ['nullable'],
        ]);


        $form = FormLangsung::where('works_id', $request->works_id)->first();

        $nama_saksi = null;

        if ($request->nama_saksi != 'null' || $request->nama_saksi != NULL) {
            $nama_saksi = $request->nama_saksi;
        }

        if ($request->alamat_saksi != 'null' || $request->alamat_saksi != NULL) {
            $alamat_saksi = $request->alamat_saksi;
        }

        if ($request->nomor_identitas != 'null' || $request->nomor_identitas != NULL) {
            $nomor_identitas = $request->nomor_identitas;
        }

        if ($request->no_telpon_saksi != 'null' || $request->no_telpon_saksi != NULL) {
            $no_telpon_saksi = $request->no_telpon_saksi;
        }

        if ($request->file_nomor_identitas != 'null' || $request->file_nomor_identitas != NULL) {
            $file_nomor_identitas = $request->file_nomor_identitas;
        }

        if (empty($form)) {
            $form = FormLangsung::create([
                'works_id' => $request->works_id,
                'nama_saksi' => $nama_saksi,
                'alamat_saksi' => $alamat_saksi,
                'nomor_identitas' => $nomor_identitas,
                'no_telpon_saksi' => $no_telpon_saksi,
                'file_nomor_identitas' => $file_nomor_identitas,
            ]);
        } else {
            $form->works_id = $request->works_id;
            $form->nama_saksi = $nama_saksi;
            $form->alamat_saksi = $alamat_saksi;
            $form->nomor_identitas = $nomor_identitas;
            $form->no_telpon_saksi = $no_telpon_saksi;
            $form->file_nomor_identitas = $file_nomor_identitas;

            $form->save();
        }


        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
