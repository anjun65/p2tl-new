<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\FormLangsung;
use App\Models\FormLangsungDataAppBaru;
use App\Models\FormLangsungDataAppLama;
use App\Models\FormLangsungHasilPemeriksaan;
use App\Models\FormLangsungPemeriksaanKwhMeter;
use App\Models\FormLangsungPemeriksaanPapanOk;
use App\Models\FormLangsungPemeriksaanPelindungBusBar;
use App\Models\FormLangsungPemeriksaanPelindungKwh;
use App\Models\FormLangsungPemeriksaanPengukuran;
use App\Models\FormLangsungPemeriksaanPenutupMcb;
use App\Models\FormLangsungPemeriksaanTerminal;
use App\Models\FormLangsungWiringApp;
use App\Models\WorkOrder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class NewFormLangsungController extends Controller
{
    public function store(Request $request)
    {
        // $request->validate([
        //     'works_id' => ['nullable'],
        //     'nama_saksi' => ['nullable'],
        //     'alamat_saksi' => ['nullable'],
        //     'nomor_identitas' => ['nullable'],
        //     'no_telpon_saksi' => ['nullable'],
        //     'file_nomor_identitas' => ['nullable'],

        //     'data_lama_merk' => ['required'],
        //     'data_lama_no_reg' => ['required'],
        //     'data_lama_no_seri' => ['required'],
        //     'data_lama_tahun_pembuatan' => ['required'],
        //     'data_lama_class' => ['required'],
        //     'data_lama_konstanta' => ['required'],
        //     'data_lama_rating_arus' => ['required'],
        //     'data_lama_tegangan_nominal' => ['required'],
        //     'data_lama_stand_kwh_meter' => ['required'],
        //     'data_lama_jenis_pembatas' => ['required'],
        //     'data_lama_alat_pembatas_merk' => ['required'],
        //     'data_lama_rating_arus_2' => ['required'],
        //     'data_lama_foto_kwh_meter' => ['required'],
        //     'data_lama_foto_pembatas' => ['required'],

        //     'data_baru_merk' => ['required'],
        //     'data_baru_no_reg' => ['required'],
        //     'data_baru_no_seri' => ['required'],
        //     'data_baru_tahun_pembuatan' => ['required'],
        //     'data_baru_class' => ['required'],
        //     'data_baru_konstanta' => ['required'],
        //     'data_baru_rating_arus' => ['required'],
        //     'data_baru_tegangan_nominal' => ['required'],
        //     'data_baru_stand_kwh_meter' => ['required'],
        //     'data_baru_jenis_pembatas' => ['required'],
        //     'data_baru_alat_pembatas_merk' => ['required'],
        //     'data_baru_rating_arus_2' => ['required'],
        //     'data_baru_foto_kwh_meter' => ['required'],
        //     'data_baru_foto_pembatas' => ['required'],
        //     'kwh_peralatan' => ['required'],
        //     'kwh_segel' => ['required'],
        //     'kwh_nomor_tahun_kode_segel' => ['required'],
        //     'kwh_keterangan' => ['required'],
        //     'kwh_foto_sebelum' => ['required'],
        //     'kwh_post_peralatan' => ['required'],
        //     'kwh_post_segel' => ['required'],
        //     'kwh_post_nomor_tahun_kode_segel' => ['required'],
        //     'kwh_foto_sesudah' => ['required'],

        //     'terminal_peralatan' => ['required'],
        //     'terminal_segel' => ['required'],
        //     'terminal_nomor_tahun_kode_segel' => ['required'],
        //     'terminal_keterangan' => ['required'],
        //     'terminal_foto_sebelum' => ['required'],
        //     'terminal_post_peralatan' => ['required'],
        //     'terminal_post_segel' => ['required'],
        //     'terminal_post_nomor_tahun_kode_segel' => ['required'],
        //     'terminal_foto_sesudah' => ['required'],

        //     'pelindung_kwh_peralatan' => ['required'],
        //     'pelindung_kwh_segel' => ['required'],
        //     'pelindung_kwh_nomor_tahun_kode_segel' => ['required'],
        //     'pelindung_kwh_keterangan' => ['required'],
        //     'pelindung_kwh_foto_sebelum' => ['required'],
        //     'pelindung_kwh_post_peralatan' => ['required'],
        //     'pelindung_kwh_post_segel' => ['required'],
        //     'pelindung_kwh_post_nomor_tahun_kode_segel' => ['required'],
        //     'pelindung_kwh_foto_sesudah' => ['required'],

        //     'busbar_peralatan' => ['required'],
        //     'busbar_segel' => ['required'],
        //     'busbar_nomor_tahun_kode_segel' => ['required'],
        //     'busbar_keterangan' => ['required'],
        //     'busbar_foto_sebelum' => ['required'],
        //     'busbar_post_peralatan' => ['required'],
        //     'busbar_post_segel' => ['required'],
        //     'busbar_post_nomor_tahun_kode_segel' => ['required'],
        //     'busbar_foto_sesudah' => ['required'],

        //     'papan_ok_peralatan' => ['required'],
        //     'papan_ok_segel' => ['required'],
        //     'papan_ok_nomor_tahun_kode_segel' => ['required'],
        //     'papan_ok_keterangan' => ['required'],
        //     'papan_ok_foto_sebelum' => ['required'],
        //     'papan_ok_post_peralatan' => ['required'],
        //     'papan_ok_post_segel' => ['required'],
        //     'papan_ok_post_nomor_tahun_kode_segel' => ['required'],
        //     'papan_ok_foto_sesudah' => ['required'],

        //     'mcb_peralatan' => ['required'],
        //     'mcb_segel' => ['required'],
        //     'mcb_nomor_tahun_kode_segel' => ['required'],
        //     'mcb_keterangan' => ['required'],
        //     'mcb_foto_sebelum' => ['required'],
        //     'mcb_post_peralatan' => ['required'],
        //     'mcb_post_segel' => ['required'],
        //     'mcb_post_nomor_tahun_kode_segel' => ['required'],
        //     'mcb_foto_sesudah' => ['required'],

        //     'pemeriksaan_keterangan' => ['required'],

        //     'pemeriksaan_arus_1' => ['required'],
        //     'pemeriksaan_arus_2' => ['required'],
        //     'pemeriksaan_arus_3' => ['required'],
        //     'pemeriksaan_arus_netral' => ['required'],
        //     'pemeriksaan_voltase_netral_1' => ['required'],
        //     'pemeriksaan_voltase_netral_2' => ['required'],
        //     'pemeriksaan_voltase_netral_3' => ['required'],
        //     'pemeriksaan_voltase_phase_1' => ['required'],
        //     'pemeriksaan_voltase_phase_2' => ['required'],
        //     'pemeriksaan_voltase_phase_3' => ['required'],
        //     'pemeriksaan_cos_1' => ['required'],
        //     'pemeriksaan_cos_2' => ['required'],
        //     'pemeriksaan_cos_3' => ['required'],
        //     'pemeriksaan_akurasi' => ['required'],
        //     'pemeriksaan_foto_sebelum' => ['required'],

        //     'wiring_terminal1' => ['required'],
        //     'wiring_terminal2' => ['required'],
        //     'wiring_terminal3' => ['required'],
        //     'wiring_terminal4' => ['required'],
        //     'wiring_terminal5' => ['required'],
        //     'wiring_terminal6' => ['required'],
        //     'wiring_terminal7' => ['required'],
        //     'wiring_terminal8' => ['required'],
        //     'wiring_terminal9' => ['required'],
        //     'wiring_terminal11' => ['required'],
        //     'wiring_keterangan_wiring_app' => ['required'],
        //     'wiring_foto' => ['required'],

        //     'akhir_hasil_pemeriksaan' => ['required'],
        //     'akhir_kesimpulan' => ['required'],
        //     'akhir_tindakan' => ['required'],
        //     'akhir_barang_bukti' => ['required'],
        //     'akhir_tanggal_penyelesaian' => ['required'],
        //     'akhir_foto_barang_bukti' => ['required'],
        //     'akhir_labor' => ['required'],
        // ]);


        $form = FormLangsung::where('works_id', $request->works_id)->first();


        $locate_file_nomor_identitas = "";

        if ($request->file_nomor_identitas) {

            $new_image = Storage::disk('public')->put('assets/saksi', $request->file_nomor_identitas);

            if ($new_image) {
                $locate_file_nomor_identitas = $new_image;
            }
        }

        $locate_data_lama_foto_kwh_meter = "";

        if ($request->data_lama_foto_kwh_meter) {
            $new_image = Storage::disk('public')->put('assets/dataAppLama/kwh', $request->data_lama_foto_kwh_meter);

            if ($new_image) {
                $locate_data_lama_foto_kwh_meter = $new_image;
            }
        }

        $locate_data_lama_foto_pembatas = "";

        if ($request->data_lama_foto_pembatas) {
            $new_image = Storage::disk('public')->put('assets/dataAppLama/pembatas', $request->data_lama_foto_pembatas);

            if ($new_image) {
                $locate_data_lama_foto_pembatas = $new_image;
            }
        }


        $locate_data_baru_foto_kwh_meter = "";

        if ($request->data_baru_foto_kwh_meter) {

            $new_image = Storage::disk('public')->put('assets/dataAppBaru/kwh', $request->data_baru_foto_kwh_meter);

            if ($new_image) {
                $locate_data_baru_foto_kwh_meter = $new_image;
            }
        }

        $locate_data_baru_foto_pembatas = "";

        if ($request->data_baru_foto_pembatas) {

            $new_image = Storage::disk('public')->put('assets/dataAppBaru/pembatas', $request->data_baru_foto_pembatas);

            if ($new_image) {
                $locate_data_baru_foto_pembatas = $new_image;
            }
        }


        $nama_saksi = '';
        $alamat_saksi = '';
        $nomor_identitas = '';
        $no_telpon_saksi = '';

        if ($request->nama_saksi !== 'null' && $request->nama_saksi != NULL) {
            $nama_saksi = $request->nama_saksi;
        }

        if ($request->alamat_saksi !== 'null' && $request->alamat_saksi != NULL) {
            $alamat_saksi = $request->alamat_saksi;
        }

        if ($request->nomor_identitas !== 'null' && $request->nomor_identitas != NULL) {
            $nomor_identitas = $request->nomor_identitas;
        }

        if ($request->no_telpon_saksi !== 'null' && $request->no_telpon_saksi != NULL) {
            $no_telpon_saksi = $request->no_telpon_saksi;
        }



        if (empty($form)) {
            $form = FormLangsung::create([
                'works_id' => $request->works_id,
                'nama_saksi' => $nama_saksi,
                'alamat_saksi' => $alamat_saksi,
                'nomor_identitas' => $nomor_identitas,
                'no_telpon_saksi' => $no_telpon_saksi,
                'file_nomor_identitas' => $locate_file_nomor_identitas,
            ]);
        } else {
            $form->works_id = $request->works_id;
            $form->nama_saksi = $nama_saksi;
            $form->alamat_saksi = $alamat_saksi;
            $form->nomor_identitas = $nomor_identitas;
            $form->no_telpon_saksi = $no_telpon_saksi;
            $form->file_nomor_identitas = $locate_file_nomor_identitas;

            $form->save();
        }

        $form_lama = FormLangsungDataAppLama::where('forms_id', $form->id)->first();

        if (empty($form_lama)) {
            $form_lama = FormLangsungDataAppLama::create([
                'forms_id' => $form->id,
                'merk' => $request->data_lama_merk,
                'no_reg' => $request->data_lama_no_reg,
                'no_seri' => $request->data_lama_no_seri,
                'tahun_pembuatan' => $request->data_lama_tahun_pembuatan,
                'class' => $request->data_lama_class,
                'konstanta' => $request->data_lama_konstanta,
                'rating_arus' => $request->data_lama_rating_arus,
                'tegangan_nominal' => $request->data_lama_tegangan_nominal,
                'stand_kwh_meter' => $request->data_lama_stand_kwh_meter,
                'foto_kwh_meter' => $locate_data_lama_foto_kwh_meter,
                'rating_arus_2' => $request->data_lama_rating_arus_2,
                'jenis_pembatas' => $request->data_lama_jenis_pembatas,
                'alat_pembatas_merk' => $request->data_lama_alat_pembatas_merk,
                'foto_pembatas' => $locate_data_lama_foto_pembatas,
            ]);
        } else {
            $form_lama->forms_id = $form->id;
            $form_lama->merk = $request->data_lama_merk;
            $form_lama->no_reg = $request->data_lama_no_reg;
            $form_lama->no_seri = $request->data_lama_no_seri;
            $form_lama->tahun_pembuatan = $request->data_lama_tahun_pembuatan;
            $form_lama->class = $request->data_lama_class;
            $form_lama->konstanta = $request->data_lama_konstanta;
            $form_lama->rating_arus = $request->data_lama_rating_arus;
            $form_lama->tegangan_nominal = $request->data_lama_tegangan_nominal;
            $form_lama->stand_kwh_meter = $request->data_lama_stand_kwh_meter;
            $form_lama->foto_kwh_meter = $locate_data_lama_foto_kwh_meter;
            $form_lama->rating_arus_2 = $request->data_lama_rating_arus_2;
            $form_lama->jenis_pembatas = $request->data_lama_jenis_pembatas;
            $form_lama->alat_pembatas_merk = $request->data_lama_alat_pembatas_merk;
            $form_lama->foto_pembatas = $locate_data_lama_foto_pembatas;

            $form_lama->save();
        }


        $form_baru = FormLangsungDataAppBaru::where('forms_id', $form->id)->first();

        if (empty($form_baru)) {
            $form_baru = FormLangsungDataAppBaru::create([
                'forms_id' => $form->id,
                'merk' => $request->data_baru_merk,
                'no_reg' => $request->data_baru_no_reg,
                'no_seri' => $request->data_baru_no_seri,
                'tahun_pembuatan' => $request->data_baru_tahun_pembuatan,
                'class' => $request->data_baru_class,
                'konstanta' => $request->data_baru_konstanta,
                'rating_arus' => $request->data_baru_rating_arus,
                'tegangan_nominal' => $request->data_baru_tegangan_nominal,
                'stand_kwh_meter' => $request->data_baru_stand_kwh_meter,
                'foto_kwh_meter' => $locate_data_baru_foto_kwh_meter,
                'rating_arus_2' => $request->data_baru_rating_arus_2,
                'jenis_pembatas' => $request->data_baru_jenis_pembatas,
                'alat_pembatas_merk' => $request->data_baru_alat_pembatas_merk,
                'foto_pembatas' => $locate_data_baru_foto_pembatas,
            ]);
        } else {
            $form_baru->forms_id = $form->id;
            $form_baru->merk = $request->data_baru_merk;
            $form_baru->no_reg = $request->data_baru_no_reg;
            $form_baru->no_seri = $request->data_baru_no_seri;
            $form_baru->tahun_pembuatan = $request->data_baru_tahun_pembuatan;
            $form_baru->class = $request->data_baru_class;
            $form_baru->konstanta = $request->data_baru_konstanta;
            $form_baru->rating_arus = $request->data_baru_rating_arus;
            $form_baru->tegangan_nominal = $request->data_baru_tegangan_nominal;
            $form_baru->stand_kwh_meter = $request->data_baru_stand_kwh_meter;
            $form_baru->foto_kwh_meter = $locate_data_baru_foto_kwh_meter;
            $form_baru->rating_arus_2 = $request->data_baru_rating_arus_2;
            $form_baru->jenis_pembatas = $request->data_baru_jenis_pembatas;
            $form_baru->alat_pembatas_merk = $request->data_baru_alat_pembatas_merk;
            $form_baru->foto_pembatas = $locate_data_baru_foto_pembatas;

            $form_baru->save();
        }

        // Pemeriksaan KWH
        $form_pemeriksaan_kwh = FormLangsungPemeriksaanKwhMeter::where('forms_id', $form->id)->first();

        $locate_kwh_foto_sebelum = "";
        if ($request->kwh_foto_sebelum) {
            $new_image = Storage::disk('public')->put('assets/dataPemeriksaan/kwh/sebelum', $request->kwh_foto_sebelum);

            if ($new_image) {
                $locate_kwh_foto_sebelum = $new_image;
            }
        }


        $locate_kwh_foto_sesudah = "";
        if ($request->kwh_foto_sesudah) {

            $new_image = Storage::disk('public')->put('assets/dataPemeriksaan/kwh/sesudah', $request->kwh_foto_sesudah);

            if ($new_image) {
                $locate_kwh_foto_sesudah = $new_image;
            }
        }


        if (empty($form_pemeriksaan_kwh)) {
            $form_pemeriksaan_kwh = FormLangsungPemeriksaanKwhMeter::create([
                'forms_id' => $form->id,
                'peralatan' => $request->kwh_peralatan,
                'segel' => $request->kwh_segel,
                'nomor_tahun_kode_segel' => $request->kwh_nomor_tahun_kode_segel,
                'keterangan' => $request->kwh_keterangan,
                'foto_sebelum' => $locate_kwh_foto_sebelum,
                'post_peralatan' => $request->kwh_post_peralatan,
                'post_segel' => $request->kwh_post_segel,
                'post_nomor_tahun_kode_segel' => $request->kwh_post_nomor_tahun_kode_segel,
                'foto_sesudah' => $locate_kwh_foto_sesudah,
            ]);
        } else {
            $form_pemeriksaan_kwh->forms_id = $form->id;
            $form_pemeriksaan_kwh->peralatan = $request->kwh_peralatan;
            $form_pemeriksaan_kwh->segel = $request->kwh_segel;
            $form_pemeriksaan_kwh->nomor_tahun_kode_segel = $request->kwh_nomor_tahun_kode_segel;
            $form_pemeriksaan_kwh->keterangan = $request->kwh_keterangan;
            $form_pemeriksaan_kwh->foto_sebelum = $locate_kwh_foto_sebelum;
            $form_pemeriksaan_kwh->post_peralatan = $request->kwh_post_peralatan;
            $form_pemeriksaan_kwh->post_segel = $request->kwh_post_segel;
            $form_pemeriksaan_kwh->post_nomor_tahun_kode_segel = $request->kwh_post_nomor_tahun_kode_segel;
            $form_pemeriksaan_kwh->foto_sesudah = $locate_kwh_foto_sesudah;

            $form_pemeriksaan_kwh->save();
        }

        //Terminal
        $form_pemeriksaan_terminal = FormLangsungPemeriksaanTerminal::where('forms_id', $form->id)->first();


        $locate_terminal_foto_sebelum = "";
        if ($request->terminal_foto_sebelum) {

            $new_image = Storage::disk('public')->put('assets/dataPemeriksaan/terminal/sebelum', $request->terminal_foto_sebelum);

            if ($new_image) {
                $locate_terminal_foto_sebelum = $new_image;
            }
        }

        $locate_terminal_foto_sesudah = "";
        if ($request->terminal_foto_sesudah) {
            $new_image = Storage::disk('public')->put('assets/dataPemeriksaan/terminal/sesudah', $request->terminal_foto_sesudah);

            if ($new_image) {
                $locate_terminal_foto_sesudah = $new_image;
            }
        }

        if (empty($form_pemeriksaan_terminal)) {
            $form_pemeriksaan_terminal = FormLangsungPemeriksaanTerminal::create([
                'forms_id' => $form->id,
                'peralatan' => $request->terminal_peralatan,
                'segel' => $request->terminal_segel,
                'nomor_tahun_kode_segel' => $request->terminal_nomor_tahun_kode_segel,
                'keterangan' => $request->terminal_keterangan,
                'foto_sebelum' => $locate_terminal_foto_sebelum,
                'post_peralatan' => $request->terminal_post_peralatan,
                'post_segel' => $request->terminal_post_segel,
                'post_nomor_tahun_kode_segel' => $request->terminal_post_nomor_tahun_kode_segel,
                'foto_sesudah' => $locate_terminal_foto_sesudah,
            ]);
        } else {
            $form_pemeriksaan_terminal->forms_id = $form->id;
            $form_pemeriksaan_terminal->peralatan = $request->terminal_peralatan;
            $form_pemeriksaan_terminal->segel = $request->terminal_segel;
            $form_pemeriksaan_terminal->nomor_tahun_kode_segel = $request->terminal_nomor_tahun_kode_segel;
            $form_pemeriksaan_terminal->keterangan = $request->terminal_keterangan;
            $form_pemeriksaan_terminal->foto_sebelum = $locate_terminal_foto_sebelum;
            $form_pemeriksaan_terminal->post_peralatan = $request->terminal_post_peralatan;
            $form_pemeriksaan_terminal->post_segel = $request->terminal_post_segel;
            $form_pemeriksaan_terminal->post_nomor_tahun_kode_segel = $request->terminal_post_nomor_tahun_kode_segel;
            $form_pemeriksaan_terminal->foto_sesudah = $locate_terminal_foto_sesudah;

            $form_pemeriksaan_terminal->save();
        }

        // Pemeriksaan Pelindung KWH Meter
        $form_pemeriksaan_pelindung_kwh = FormLangsungPemeriksaanPelindungKwh::where('forms_id', $form->id)->first();


        $locate_pelindung_kwh_foto_sebelum = "";
        if ($request->pelindung_kwh_foto_sebelum) {

            $new_image = Storage::disk('public')->put('assets/dataPemeriksaan/pelindungkwh/sebelum', $request->pelindung_kwh_foto_sebelum);

            if ($new_image) {
                $locate_pelindung_kwh_foto_sebelum = $new_image;
            }
        }

        $locate_pelindung_kwh_foto_sesudah = "";
        if ($request->pelindung_kwh_foto_sesudah) {

            $new_image = Storage::disk('public')->put('assets/dataPemeriksaan/pelindungkwh/sesudah', $request->pelindung_kwh_foto_sesudah);

            if ($new_image) {
                $locate_pelindung_kwh_foto_sesudah = $new_image;
            }
        }

        if (empty($form_pemeriksaan_pelindung_kwh)) {
            $form_pemeriksaan_pelindung_kwh = FormLangsungPemeriksaanPelindungKwh::create([
                'forms_id' => $form->id,
                'peralatan' => $request->pelindung_kwh_peralatan,
                'segel' => $request->pelindung_kwh_segel,
                'nomor_tahun_kode_segel' => $request->pelindung_kwh_nomor_tahun_kode_segel,
                'keterangan' => $request->pelindung_kwh_keterangan,
                'foto_sebelum' => $locate_pelindung_kwh_foto_sebelum,
                'post_peralatan' => $request->pelindung_kwh_post_peralatan,
                'post_segel' => $request->pelindung_kwh_post_segel,
                'post_nomor_tahun_kode_segel' => $request->pelindung_kwh_post_nomor_tahun_kode_segel,
                'foto_sesudah' => $locate_pelindung_kwh_foto_sesudah,
            ]);
        } else {
            $form_pemeriksaan_pelindung_kwh->forms_id = $form->id;
            $form_pemeriksaan_pelindung_kwh->peralatan = $request->pelindung_kwh_peralatan;
            $form_pemeriksaan_pelindung_kwh->segel = $request->pelindung_kwh_segel;
            $form_pemeriksaan_pelindung_kwh->nomor_tahun_kode_segel = $request->pelindung_kwh_nomor_tahun_kode_segel;
            $form_pemeriksaan_pelindung_kwh->keterangan = $request->pelindung_kwh_keterangan;
            $form_pemeriksaan_pelindung_kwh->foto_sebelum = $locate_pelindung_kwh_foto_sebelum;
            $form_pemeriksaan_pelindung_kwh->post_peralatan = $request->pelindung_kwh_post_peralatan;
            $form_pemeriksaan_pelindung_kwh->post_segel = $request->pelindung_kwh_post_segel;
            $form_pemeriksaan_pelindung_kwh->post_nomor_tahun_kode_segel = $request->pelindung_kwh_post_nomor_tahun_kode_segel;
            $form_pemeriksaan_pelindung_kwh->foto_sesudah = $locate_pelindung_kwh_foto_sesudah;

            $form_pemeriksaan_pelindung_kwh->save();
        }

        // Pemeriksaan Pelindung Busbar
        $form_pemeriksaan_pelindung_busbar = FormLangsungPemeriksaanPelindungBusBar::where('forms_id', $form->id)->first();


        $locate_busbar_foto_sebelum = "";
        if ($request->busbar_foto_sebelum) {
            $new_image = Storage::disk('public')->put('assets/dataPemeriksaan/busbar/sebelum', $request->busbar_foto_sebelum);

            if ($new_image) {
                $locate_busbar_foto_sebelum = $new_image;
            }
        }

        $locate_busbar_foto_sesudah = "";
        if ($request->busbar_foto_sesudah) {

            $new_image = Storage::disk('public')->put('assets/dataPemeriksaan/busbar/sesudah', $request->busbar_foto_sesudah);

            if ($new_image) {
                $locate_busbar_foto_sesudah = $new_image;
            }
        }

        if (empty($form_pemeriksaan_pelindung_busbar)) {
            $form_pemeriksaan_pelindung_busbar = FormLangsungPemeriksaanPelindungBusBar::create([
                'forms_id' => $form->id,
                'peralatan' => $request->busbar_peralatan,
                'segel' => $request->busbar_segel,
                'nomor_tahun_kode_segel' => $request->busbar_nomor_tahun_kode_segel,
                'keterangan' => $request->busbar_keterangan,
                'foto_sebelum' => $locate_busbar_foto_sebelum,
                'post_peralatan' => $request->busbar_post_peralatan,
                'post_segel' => $request->busbar_post_segel,
                'post_nomor_tahun_kode_segel' => $request->busbar_post_nomor_tahun_kode_segel,
                'foto_sesudah' => $locate_busbar_foto_sesudah,
            ]);
        } else {
            $form_pemeriksaan_pelindung_busbar->forms_id = $form->id;
            $form_pemeriksaan_pelindung_busbar->peralatan = $request->busbar_peralatan;
            $form_pemeriksaan_pelindung_busbar->segel = $request->busbar_segel;
            $form_pemeriksaan_pelindung_busbar->nomor_tahun_kode_segel = $request->busbar_nomor_tahun_kode_segel;
            $form_pemeriksaan_pelindung_busbar->keterangan = $request->busbar_keterangan;
            $form_pemeriksaan_pelindung_busbar->foto_sebelum = $locate_busbar_foto_sebelum;
            $form_pemeriksaan_pelindung_busbar->post_peralatan = $request->busbar_post_peralatan;
            $form_pemeriksaan_pelindung_busbar->post_segel = $request->busbar_post_segel;
            $form_pemeriksaan_pelindung_busbar->post_nomor_tahun_kode_segel = $request->busbar_post_nomor_tahun_kode_segel;
            $form_pemeriksaan_pelindung_busbar->foto_sesudah = $locate_busbar_foto_sesudah;

            $form_pemeriksaan_pelindung_busbar->save();
        }

        // Pemeriksaan Papan OK
        $form_pemeriksaan_papan_ok = FormLangsungPemeriksaanPapanOk::where('forms_id', $form->id)->first();

        $locate_papan_ok_foto_sebelum = "";
        if ($request->papan_ok_foto_sebelum) {


            $new_image = Storage::disk('public')->put('assets/dataPemeriksaan/papan/sebelum', $request->papan_ok_foto_sebelum);

            if ($new_image) {
                $locate_papan_ok_foto_sebelum = $new_image;
            }
        }

        $locate_papan_ok_foto_sesudah = "";
        if ($request->papan_ok_foto_sesudah) {

            $new_image = Storage::disk('public')->put('assets/dataPemeriksaan/papan/sesudah', $request->papan_ok_foto_sesudah);

            if ($new_image) {
                $locate_papan_ok_foto_sesudah = $new_image;
            }
        }


        if (empty($form_pemeriksaan_papan_ok)) {
            $form_pemeriksaan_papan_ok = FormLangsungPemeriksaanPapanOk::create([
                'forms_id' => $form->id,
                'peralatan' => $request->papan_ok_peralatan,
                'segel' => $request->papan_ok_segel,
                'nomor_tahun_kode_segel' => $request->papan_ok_nomor_tahun_kode_segel,
                'keterangan' => $request->papan_ok_keterangan,
                'foto_sebelum' => $locate_papan_ok_foto_sebelum,
                'post_peralatan' => $request->papan_ok_post_peralatan,
                'post_segel' => $request->papan_ok_post_segel,
                'post_nomor_tahun_kode_segel' => $request->papan_ok_post_nomor_tahun_kode_segel,
                'foto_sesudah' => $locate_papan_ok_foto_sesudah,
            ]);
        } else {
            $form_pemeriksaan_papan_ok->forms_id = $form->id;
            $form_pemeriksaan_papan_ok->peralatan = $request->papan_ok_peralatan;
            $form_pemeriksaan_papan_ok->segel = $request->papan_ok_segel;
            $form_pemeriksaan_papan_ok->nomor_tahun_kode_segel = $request->papan_ok_nomor_tahun_kode_segel;
            $form_pemeriksaan_papan_ok->keterangan = $request->papan_ok_keterangan;
            $form_pemeriksaan_papan_ok->foto_sebelum = $locate_papan_ok_foto_sebelum;
            $form_pemeriksaan_papan_ok->post_peralatan = $request->papan_ok_post_peralatan;
            $form_pemeriksaan_papan_ok->post_segel = $request->papan_ok_post_segel;
            $form_pemeriksaan_papan_ok->post_nomor_tahun_kode_segel = $request->papan_ok_post_nomor_tahun_kode_segel;
            $form_pemeriksaan_papan_ok->foto_sesudah = $locate_papan_ok_foto_sesudah;

            $form_pemeriksaan_papan_ok->save();
        }

        // Pemeriksaan MCB
        $form_pemeriksaan_mcb = FormLangsungPemeriksaanPenutupMcb::where('forms_id', $form->id)->first();


        $locate_mcb_foto_sebelum = "";
        if ($request->mcb_foto_sebelum) {

            $new_image = Storage::disk('public')->put('assets/dataPemeriksaan/mcb/sebelum', $request->mcb_foto_sebelum);

            if ($new_image) {
                $locate_mcb_foto_sebelum = $new_image;
            }
        }

        $locate_mcb_foto_sesudah = "";
        if ($request->mcb_foto_sesudah) {

            $new_image = Storage::disk('public')->put('assets/dataPemeriksaan/mcb/sesudah', $request->mcb_foto_sesudah);

            if ($new_image) {
                $locate_mcb_foto_sesudah = $new_image;
            }
        }


        if (empty($form_pemeriksaan_mcb)) {
            $form_pemeriksaan_mcb = FormLangsungPemeriksaanPenutupMcb::create([
                'forms_id' => $form->id,
                'peralatan' => $request->mcb_peralatan,
                'segel' => $request->mcb_segel,
                'nomor_tahun_kode_segel' => $request->mcb_nomor_tahun_kode_segel,
                'keterangan' => $request->mcb_keterangan,
                'foto_sebelum' => $locate_mcb_foto_sebelum,
                'post_peralatan' => $request->mcb_post_peralatan,
                'post_segel' => $request->mcb_post_segel,
                'post_nomor_tahun_kode_segel' => $request->mcb_post_nomor_tahun_kode_segel,
                'foto_sesudah' => $locate_mcb_foto_sesudah,
                'all_keterangan' => $request->pemeriksaan_keterangan,
            ]);
        } else {
            $form_pemeriksaan_mcb->forms_id = $form->id;
            $form_pemeriksaan_mcb->peralatan = $request->mcb_peralatan;
            $form_pemeriksaan_mcb->segel = $request->mcb_segel;
            $form_pemeriksaan_mcb->nomor_tahun_kode_segel = $request->mcb_nomor_tahun_kode_segel;
            $form_pemeriksaan_mcb->keterangan = $request->mcb_keterangan;
            $form_pemeriksaan_mcb->foto_sebelum = $locate_mcb_foto_sebelum;
            $form_pemeriksaan_mcb->post_peralatan = $request->mcb_post_peralatan;
            $form_pemeriksaan_mcb->post_segel = $request->mcb_post_segel;
            $form_pemeriksaan_mcb->post_nomor_tahun_kode_segel = $request->mcb_post_nomor_tahun_kode_segel;
            $form_pemeriksaan_mcb->foto_sesudah = $locate_mcb_foto_sesudah;
            $form_pemeriksaan_mcb->all_keterangan = $request->pemeriksaan_keterangan;


            $form_pemeriksaan_mcb->save();
        }



        // Pemeriksaan dan Pengukuran
        $form_pemeriksaan_pengukuran = FormLangsungPemeriksaanPengukuran::where('forms_id', $form->id)->first();

        $locate_pemeriksaan_foto_sebelum = "";
        if ($request->pemeriksaan_foto_sebelum) {

            $new_image = Storage::disk('public')->put('assets/dataPemeriksaan/pengukuran', $request->pemeriksaan_foto_sebelum);

            if ($new_image) {
                $locate_pemeriksaan_foto_sebelum = $new_image;
            }
        }

        if (empty($form_pemeriksaan_pengukuran)) {
            $form_pemeriksaan_pengukuran = FormLangsungPemeriksaanPengukuran::create([
                'forms_id' => $form->id,
                'arus_1' => $request->pemeriksaan_arus_1,
                'arus_2' => $request->pemeriksaan_arus_2,
                'arus_3' => $request->pemeriksaan_arus_3,
                'arus_netral' => $request->pemeriksaan_arus_netral,
                'voltase_netral_1' => $request->pemeriksaan_voltase_netral_1,
                'voltase_netral_2' => $request->pemeriksaan_voltase_netral_2,
                'voltase_netral_3' => $request->pemeriksaan_voltase_netral_3,
                'voltase_phase_1' => $request->pemeriksaan_voltase_phase_1,
                'voltase_phase_2' => $request->pemeriksaan_voltase_phase_2,
                'voltase_phase_3' => $request->pemeriksaan_voltase_phase_3,
                'cos_1' => $request->pemeriksaan_cos_1,
                'cos_2' => $request->pemeriksaan_cos_2,
                'cos_3' => $request->pemeriksaan_cos_3,
                'akurasi' => $request->pemeriksaan_akurasi,
                'foto_sebelum' => $locate_pemeriksaan_foto_sebelum,
            ]);
        } else {

            $form_pemeriksaan_pengukuran->forms_id = $form->id;
            $form_pemeriksaan_pengukuran->arus_1 = $request->pemeriksaan_arus_1;
            $form_pemeriksaan_pengukuran->arus_2 = $request->pemeriksaan_arus_2;
            $form_pemeriksaan_pengukuran->arus_3 = $request->pemeriksaan_arus_3;
            $form_pemeriksaan_pengukuran->arus_netral = $request->pemeriksaan_arus_netral;
            $form_pemeriksaan_pengukuran->voltase_netral_1 = $request->pemeriksaan_voltase_netral_1;
            $form_pemeriksaan_pengukuran->voltase_netral_2 = $request->pemeriksaan_voltase_netral_2;
            $form_pemeriksaan_pengukuran->voltase_netral_3 = $request->pemeriksaan_voltase_netral_3;
            $form_pemeriksaan_pengukuran->voltase_phase_1 = $request->pemeriksaan_voltase_phase_1;
            $form_pemeriksaan_pengukuran->voltase_phase_2 = $request->pemeriksaan_voltase_phase_2;
            $form_pemeriksaan_pengukuran->voltase_phase_3 = $request->pemeriksaan_voltase_phase_3;
            $form_pemeriksaan_pengukuran->cos_1 = $request->pemeriksaan_cos_1;
            $form_pemeriksaan_pengukuran->cos_2 = $request->pemeriksaan_cos_2;
            $form_pemeriksaan_pengukuran->cos_3 = $request->pemeriksaan_cos_3;
            $form_pemeriksaan_pengukuran->akurasi = $request->pemeriksaan_akurasi;
            $form_pemeriksaan_pengukuran->foto_sebelum = $locate_pemeriksaan_foto_sebelum;


            $form_pemeriksaan_pengukuran->save();
        }

        // Wiring APP
        $form_wiring_app = FormLangsungWiringApp::where('forms_id', $form->id)->first();

        $locate_wiring_foto = "";
        if ($request->wiring_foto) {
            $new_image = Storage::disk('public')->put('assets/datawiringapp', $request->wiring_foto);

            if ($new_image) {
                $locate_wiring_foto = $new_image;
            }
        }

        if (empty($form_wiring_app)) {
            $form_wiring_app = FormLangsungWiringApp::create([
                'forms_id' => $form->id,
                'terminal1' => $request->wiring_terminal1,
                'terminal2' => $request->wiring_terminal2,
                'terminal3' => $request->wiring_terminal3,
                'terminal4' => $request->wiring_terminal4,
                'terminal5' => $request->wiring_terminal5,
                'terminal6' => $request->wiring_terminal6,
                'terminal7' => $request->wiring_terminal7,
                'terminal8' => $request->wiring_terminal8,
                'terminal9' => $request->wiring_terminal9,
                'terminal11' => $request->wiring_terminal11,
                'keterangan_wiring_app' => $request->wiring_keterangan_wiring_app,
                'foto_sebelum' => $locate_wiring_foto,

            ]);
        } else {
            $form_wiring_app->forms_id = $form->id;
            $form_wiring_app->terminal1 = $request->wiring_terminal1;
            $form_wiring_app->terminal2 = $request->wiring_terminal2;
            $form_wiring_app->terminal3 = $request->wiring_terminal3;
            $form_wiring_app->terminal4 = $request->wiring_terminal4;
            $form_wiring_app->terminal5 = $request->wiring_terminal5;
            $form_wiring_app->terminal6 = $request->wiring_terminal6;
            $form_wiring_app->terminal7 = $request->wiring_terminal7;
            $form_wiring_app->terminal8 = $request->wiring_terminal8;
            $form_wiring_app->terminal9 = $request->wiring_terminal9;
            $form_wiring_app->terminal11 = $request->wiring_terminal11;
            $form_wiring_app->keterangan_wiring_app = $request->wiring_keterangan_wiring_app;
            $form_wiring_app->foto_sebelum = $locate_wiring_foto;

            $form_wiring_app->save();
        }

        // Hasil Pemeriksaan
        $form_hasil_pemeriksaan = FormLangsungHasilPemeriksaan::where('forms_id', $form->id)->first();


        // $locate_akhir_foto_barang_bukti = "";
        // if ($request->akhir_foto_barang_bukti) {
        //     $new_image = Storage::disk('public')->put('assets/hasilakhir', $request->akhir_foto_barang_bukti);

        //     if ($new_image) {
        //         $locate_akhir_foto_barang_bukti = $new_image;
        //     }
        // }


        $akhir_tanggal_penyelesaian = Carbon::now()->format('Y-m-d');
        if ($request->akhir_tanggal_penyelesaian !== 'null' || $request->akhir_tanggal_penyelesaian != Null) {
            $akhir_tanggal_penyelesaian = Carbon::parse($request->akhir_tanggal_penyelesaian)->format('Y-m-d');
        }


        if (empty($form_hasil_pemeriksaan)) {
            $form_hasil_pemeriksaan = FormLangsungHasilPemeriksaan::create([
                'forms_id' => $form->id,
                'hasil_pemeriksaan' => $request->akhir_hasil_pemeriksaan,
                'kesimpulan' => $request->akhir_kesimpulan,
                'tindakan' => $request->akhir_tindakan,
                'barang_bukti' => $request->akhir_barang_bukti,
                'tanggal_penyelesaian' => $akhir_tanggal_penyelesaian,
                // 'foto_barang_bukti' => $locate_akhir_foto_barang_bukti,
            ]);
        } else {
            $form_hasil_pemeriksaan->forms_id = $form->id;
            $form_hasil_pemeriksaan->hasil_pemeriksaan = $request->akhir_hasil_pemeriksaan;
            $form_hasil_pemeriksaan->kesimpulan = $request->kesimpulan;
            $form_hasil_pemeriksaan->tindakan = $request->tindakan;
            $form_hasil_pemeriksaan->barang_bukti = $request->akhir_barang_bukti;
            $form_hasil_pemeriksaan->tanggal_penyelesaian = $request->akhir_tanggal_penyelesaian;
            $form_hasil_pemeriksaan->foto_barang_bukti = $locate_akhir_foto_barang_bukti;

            $form_hasil_pemeriksaan->save();
        }

        $akhir_labor = 0;
        if ($request->akhir_labor == 1) {
            $akhir_labor = 1;
        }

        $work = WorkOrder::where('id', $form->works_id)->first();
        $work->labor = $akhir_labor;
        $work->save();

        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
