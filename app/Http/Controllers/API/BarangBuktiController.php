<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\BarangBukti;
use App\Helpers\ResponseFormatter;


class BarangBuktiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'works_id' => ['nullable'],
            'nama_saksi' => ['nullable'],
            'alamat_saksi' => ['nullable'],
            'nomor_identitas' => ['nullable'],
            'no_telpon_saksi' => ['nullable'],
            'file_identitas' => ['nullable', 'image'],
            'jenis_kabel' => ['nullable'],
            'panjang_kabel' => ['nullable'],
            'tera' => ['nullable'],
            'terminal_kwh_meter' => ['nullable'],
            'box_ok' => ['nullable'],
            'box_app' => ['nullable'],
            'alat_pembatas' => ['nullable'],
            'alat_bantu_ukur' => ['nullable'],
            'file_barang_bukti' => ['nullable', 'image'],
        ]);

        $form = BarangBukti::where('works_id', $request->works_id)->first();

        $new_file_identitas = '';
        $new_file_barang_bukti = '';

        if ($request->file_identitas) {
            $new_file_identitas = Storage::putFileAs('public/assets/barang-bukti', $request->file_identitas, 'identitas_' . $request->nama_saksi . '|' . $request->identitas_saksi . '.' . $request->file_identitas->getClientOriginalExtension());
        }

        if ($request->file_barang_bukti) {
            $new_file_barang_bukti = Storage::putFileAs('public/assets/barang-bukti', $request->file_barang_bukti, 'foto_barang_bukti_' . $request->works_id . '.' . $request->file_barang_bukti->getClientOriginalExtension());
        }


        if (empty($form)) {
            $form = BarangBukti::create([
                'works_id' => $request->works_id,
                'nama_saksi' => $request->nama_saksi,
                'alamat_saksi' => $request->alamat_saksi,
                'nomor_identitas' => $request->nomor_identitas,
                'no_telpon_saksi' => $request->no_telpon_saksi,
                'file_identitas' => $new_file_identitas,
                'jenis_kabel' => $request->jenis_kabel,
                'panjang_kabel' => $request->panjang_kabel,
                'tera' => $request->tera,
                'terminal_kwh_meter' => $request->terminal_kwh_meter,
                'box_ok' => $request->box_ok,
                'box_app' => $request->box_app,
                'alat_pembatas' => $request->alat_pembatas,
                'alat_bantu_ukur' => $request->alat_bantu_ukur,
                'file_barang_bukti' => $new_file_barang_bukti,
            ]);
        } else {
            $form->works_id = $request->works_id;
            $form->nama_saksi = $request->nama_saksi;
            $form->alamat_saksi = $request->alamat_saksi;
            $form->nomor_identitas = $request->nomor_identitas;
            $form->no_telpon_saksi = $request->no_telpon_saksi;
            $form->file_identitas = $new_file_identitas;
            $form->jenis_kabel = $request->jenis_kabel;
            $form->panjang_kabel = $request->panjang_kabel;
            $form->tera = $request->tera;
            $form->terminal_kwh_meter = $request->terminal_kwh_meter;
            $form->box_ok = $request->box_ok;
            $form->box_app = $request->box_app;
            $form->alat_pembatas = $request->alat_pembatas;
            $form->alat_bantu_ukur = $request->alat_bantu_ukur;
            $form->file_barang_bukti = $new_file_barang_bukti;
            $form->save();
        }

        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
