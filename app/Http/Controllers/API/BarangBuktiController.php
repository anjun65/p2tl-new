<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\BarangBukti;
use App\Helpers\ResponseFormatter;


class BarangBuktiController extends Controller
{
    public function show(Request $request)
    {
        $request->validate([
            'works_id' => ['required'],
        ]);

        $form = BarangBukti::where('works_id', $request->works_id)->first();

        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'works_id' => ['required'],
            'nama_saksi' => ['nullable'],
            'alamat_saksi' => ['nullable'],
            'nomor_identitas' => ['nullable'],
            'no_telpon_saksi' => ['nullable'],
            'foto_identitas' => ['nullable', 'image'],
            'kabel_jenis' => ['nullable'],
            'kabel_panjang' => ['nullable'],
            'segel_tera' => ['nullable'],
            'segel_terminal' => ['nullable'],
            'segel_box_ok' => ['nullable'],
            'segel_box_app' => ['nullable'],
            'segel_alat_pembatas' => ['nullable'],
            'segel_alat_bantu_ukur' => ['nullable'],
            'segel_foto' => ['nullable', 'image'],
        ]);

        $form = BarangBukti::where('works_id', $request->works_id)->first();

        $new_file_identitas = "";
        if ($request->foto_identitas) {
            $new_image = Storage::disk('public')->put('assets/pengambilan-bb/identitas', $request->foto_identitas);

            if ($new_image) {
                $new_file_identitas = $new_image;
            }
        }

        $new_segel_foto = "";
        if ($request->segel_foto) {
            $new_image = Storage::disk('public')->put('assets/pengambilan-bb/barang-bukti', $request->segel_foto);

            if ($new_image) {
                $new_segel_foto = $new_image;
            }
        }


        if (empty($form)) {
            $form = BarangBukti::create([
                'works_id' => $request->works_id,
                'nama_saksi' => $request->nama_saksi,
                'alamat_saksi' => $request->alamat_saksi,
                'nomor_identitas' => $request->nomor_identitas,
                'no_telpon_saksi' => $request->no_telpon_saksi,
                'file_identitas' => $new_file_identitas,
                'jenis_kabel' => $request->kabel_jenis,
                'panjang_kabel' => $request->kabel_panjang,
                'tera' => $request->segel_tera,
                'terminal_kwh_meter' => $request->segel_terminal,
                'box_ok' => $request->segel_box_ok,
                'box_app' => $request->segel_box_app,
                'alat_pembatas' => $request->segel_alat_pembatas,
                'alat_bantu_ukur' => $request->segel_alat_bantu_ukur,
                'file_barang_bukti' => $new_segel_foto,
            ]);
        } else {
            $form->works_id = $request->works_id;
            $form->nama_saksi = $request->nama_saksi;
            $form->alamat_saksi = $request->alamat_saksi;
            $form->nomor_identitas = $request->nomor_identitas;
            $form->no_telpon_saksi = $request->no_telpon_saksi;
            $form->file_identitas = $new_file_identitas;
            $form->jenis_kabel = $request->kabel_jenis;
            $form->panjang_kabel = $request->kabel_panjang;
            $form->tera = $request->segel_tera;
            $form->terminal_kwh_meter = $request->segel_terminal;
            $form->box_ok = $request->segel_box_ok;
            $form->box_app = $request->segel_box_app;
            $form->alat_pembatas = $request->segel_alat_pembatas;
            $form->alat_bantu_ukur = $request->segel_alat_bantu_ukur;
            $form->file_barang_bukti = $new_segel_foto;
            $form->save();
        }

        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
