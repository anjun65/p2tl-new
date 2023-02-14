<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewFormLangsung;
use App\Helpers\ResponseFormatter;

class NewFormLangsungController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'works_id' => ['required'],
            'regus_id' => ['required'],
            'nama_saksi' => ['nullable'],
            'alamat_saksi' => ['nullable'],
            'nomor_identitas' => ['nullable'],
            'pekerjaan' => ['nullable'],
            'no_telpon_saksi' => ['nullable'],
            'file_nomor_identitas' => ['nullable'],
            'data_lama_merk' => ['required'],
            'data_lama_no_reg' => ['required'],
            'data_lama_no_seri' => ['required'],
            'data_lama_tahun_pembuatan' => ['required'],
            'data_lama_class' => ['required'],
            'data_lama_konstanta' => ['required'],
            'data_lama_rating_arus' => ['required'],
            'data_lama_tegangan_nominal' => ['required'],
            'data_lama_stand_kwh_meter' => ['required'],
            'data_lama_jenis_pembatas' => ['required'],
            'data_lama_alat_pembatas_merk' => ['required'],
            'data_lama_rating_arus_2' => ['required'],
            'data_lama_foto_kwh_meter' => ['required'],
            'data_lama_foto_pembatas' => ['required'],
            'data_baru_merk' => ['required'],
            'data_baru_no_reg' => ['required'],
            'data_baru_no_seri' => ['required'],
            'data_baru_tahun_pembuatan' => ['required'],
            'data_baru_class' => ['required'],
            'data_baru_konstanta' => ['required'],
            'data_baru_rating_arus' => ['required'],
            'data_baru_tegangan_nominal' => ['required'],
            'data_baru_stand_kwh_meter' => ['required'],
            'data_baru_jenis_pembatas' => ['required'],
            'data_baru_alat_pembatas_merk' => ['required'],
            'data_baru_rating_arus_2' => ['required'],
            'data_baru_foto_kwh_meter' => ['required'],
            'data_baru_foto_pembatas' => ['required'],
            'kwh_peralatan' => ['required'],
            'kwh_segel' => ['required'],
            'kwh_nomor_tahun_kode_segel' => ['required'],
            'kwh_keterangan' => ['required'],
            'kwh_foto_sebelum' => ['required'],
            'kwh_post_peralatan' => ['required'],
            'kwh_post_segel' => ['required'],
            'kwh_post_nomor_tahun_kode_segel' => ['required'],
            'kwh_foto_sesudah' => ['required'],
            'terminal_peralatan' => ['required'],
            'terminal_segel' => ['required'],
            'terminal_nomor_tahun_kode_segel' => ['required'],
            'terminal_keterangan' => ['required'],
            'terminal_foto_sebelum' => ['required'],
            'terminal_post_peralatan' => ['required'],
            'terminal_post_segel' => ['required'],
            'terminal_post_nomor_tahun_kode_segel' => ['required'],
            'terminal_foto_sesudah' => ['required'],
            'pelindung_kwh_peralatan' => ['required'],
            'pelindung_kwh_segel' => ['required'],
            'pelindung_kwh_nomor_tahun_kode_segel' => ['required'],
            'pelindung_kwh_keterangan' => ['required'],
            'pelindung_kwh_foto_sebelum' => ['required'],
            'pelindung_kwh_post_peralatan' => ['required'],
            'pelindung_kwh_post_segel' => ['required'],
            'pelindung_kwh_post_nomor_tahun_kode_segel' => ['required'],
            'pelindung_kwh_foto_sesudah' => ['required'],
            'busbar_peralatan' => ['required'],
            'busbar_segel' => ['required'],
            'busbar_nomor_tahun_kode_segel' => ['required'],
            'busbar_keterangan' => ['required'],
            'busbar_foto_sebelum' => ['required'],
            'busbar_post_peralatan' => ['required'],
            'busbar_post_segel' => ['required'],
            'busbar_post_nomor_tahun_kode_segel' => ['required'],
            'busbar_foto_sesudah' => ['required'],
            'papan_ok_peralatan' => ['required'],
            'papan_ok_segel' => ['required'],
            'papan_ok_nomor_tahun_kode_segel' => ['required'],
            'papan_ok_keterangan' => ['required'],
            'papan_ok_foto_sebelum' => ['required'],
            'papan_ok_post_peralatan' => ['required'],
            'papan_ok_post_segel' => ['required'],
            'papan_ok_post_nomor_tahun_kode_segel' => ['required'],
            'papan_ok_foto_sesudah' => ['required'],
            'mcb_peralatan' => ['required'],
            'mcb_segel' => ['required'],
            'mcb_nomor_tahun_kode_segel' => ['required'],
            'mcb_keterangan' => ['required'],
            'mcb_foto_sebelum' => ['required'],
            'mcb_post_peralatan' => ['required'],
            'mcb_post_segel' => ['required'],
            'mcb_post_nomor_tahun_kode_segel' => ['required'],
            'mcb_foto_sesudah' => ['required'],
            'pemeriksaan_keterangan' => ['required'],
            'pemeriksaan_arus_1' => ['required'],
            'pemeriksaan_arus_2' => ['required'],
            'pemeriksaan_arus_3' => ['required'],
            'pemeriksaan_arus_netral' => ['required'],
            'pemeriksaan_voltase_netral_1' => ['required'],
            'pemeriksaan_voltase_netral_2' => ['required'],
            'pemeriksaan_voltase_netral_3' => ['required'],
            'pemeriksaan_voltase_phase_1' => ['required'],
            'pemeriksaan_voltase_phase_2' => ['required'],
            'pemeriksaan_voltase_phase_3' => ['required'],
            'pemeriksaan_cos_1' => ['required'],
            'pemeriksaan_cos_2' => ['required'],
            'pemeriksaan_cos_3' => ['required'],
            'pemeriksaan_akurasi' => ['required'],
            'pemeriksaan_foto_sebelum' => ['required'],
            'wiring_terminal1' => ['required'],
            'wiring_terminal2' => ['required'],
            'wiring_terminal3' => ['required'],
            'wiring_terminal4' => ['required'],
            'wiring_terminal5' => ['required'],
            'wiring_terminal6' => ['required'],
            'wiring_terminal7' => ['required'],
            'wiring_terminal8' => ['required'],
            'wiring_terminal9' => ['required'],
            'wiring_terminal11' => ['required'],
            'wiring_keterangan_wiring_app' => ['required'],
            'wiring_foto' => ['required'],
            'akhir_hasil_pemeriksaan' => ['required'],
            'akhir_kesimpulan' => ['required'],
            'akhir_tindakan' => ['required'],
            'akhir_barang_bukti' => ['required'],
            'akhir_tanggal_penyelesaian' => ['required'],
            'akhir_foto_barang_bukti' => ['required'],
            'akhir_labor' => ['required'],
        ]);


        return ResponseFormatter::success($request->akhir_labor, 'Berhasil ditambahkan');

        $form = NewFormLangsung::where('works_id', $request->works_id)->first();

        if (empty($form)) {
            $form = NewFormLangsung::create([
                'works_id' => $request->works_id,
                'regus_id' => $request->regus_id,
                'nama_saksi' => $request->nama_saksi,
                'alamat_saksi' => $request->alamat_saksi,
                'nomor_identitas' => $request->nomor_identitas,
                'pekerjaan' => $request->pekerjaan,
                'no_telpon_saksi' => $request->no_telpon_saksi,
                'file_nomor_identitas' => $request->file_nomor_identitas,
            ]);
        } else {
            $form->works_id = $request->works_id;
            $form->regus_id = $request->regus_id;
            $form->nama_saksi = '$request->nama_saksi';
            $form->alamat_saksi = $request->alamat_saksi;
            $form->nomor_identitas = $request->nomor_identitas;
            $form->pekerjaan = $request->pekerjaan;
            $form->no_telpon_saksi = $request->no_telpon_saksi;
            $form->file_nomor_identitas = $request->file_nomor_identitas;

            $form->save();
        }
    }
}
