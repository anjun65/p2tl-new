<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PembukaanBarangBukti;
use App\Helpers\ResponseFormatter;

class PembukaanBarangBuktiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'forms_id' => ['required'],
            'status' => ['required'],
        ]);

        $form = PembukaanBarangBukti::where('forms_id', $request->forms_id)->first();


        if (empty($form)) {
            $form = PembukaanBarangBukti::create([
                'forms_id' => $request->forms_id,
                'status' => $request->status,
            ]);
        } else {
            $form->forms_id = $request->forms_id;
            $form->status = $request->status;
            $form->save();
        }

        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
