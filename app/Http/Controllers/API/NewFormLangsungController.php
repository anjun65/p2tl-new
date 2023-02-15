<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\FormLangsung;
use App\Models\FormLangsungDataAppBaru;
use App\Models\FormLangsungDataAppLama;
use App\Models\FormLangsungPemeriksaanKwhMeter;
use App\Models\FormLangsungPemeriksaanPapanOk;
use App\Models\FormLangsungPemeriksaanPelindungBusBar;
use App\Models\FormLangsungPemeriksaanPelindungKwh;
use App\Models\FormLangsungPemeriksaanPenutupMcb;
use App\Models\FormLangsungPemeriksaanTerminal;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        ]);

        $form = FormLangsung::where('works_id', $request->works_id)->first();


        $locate_file_nomor_identitas = "";
        if ($request->file_nomor_identitas !== 'null' && $request->file_nomor_identitas != NULL) {
            $image_64 = $request->file_nomor_identitas;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/saksi/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_file_nomor_identitas = 'assets/saksi/' . $imageName;
            }
        }

        $locate_data_lama_foto_kwh_meter = "";
        if ($request->data_lama_foto_kwh_meter !== 'null' && $request->data_lama_foto_kwh_meter != NULL) {
            $image_64 = $request->data_lama_foto_kwh_meter;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/dataAppLama/kwh/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_data_lama_foto_kwh_meter = 'assets/dataAppLama/kwh/' . $imageName;
            }
        }

        $locate_data_lama_foto_pembatas = "";
        if ($request->data_lama_foto_pembatas !== 'null' && $request->data_lama_foto_pembatas != NULL) {
            $image_64 = $request->data_lama_foto_pembatas;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/dataAppLama/pembatas/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_data_lama_foto_pembatas = 'assets/dataAppLama/pembatas/' . $imageName;
            }
        }


        $locate_data_baru_foto_kwh_meter = "";
        if ($request->data_baru_foto_kwh_meter !== 'null' && $request->data_baru_foto_kwh_meter != NULL) {
            $image_64 = $request->data_lama_foto_pembatas;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/dataAppBaru/kwh/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_data_baru_foto_kwh_meter = 'assets/dataAppBaru/kwh/' . $imageName;
            }
        }


        $locate_data_baru_foto_pembatas = "";
        if ($request->data_baru_foto_pembatas !== 'null' && $request->data_baru_foto_pembatas != NULL) {
            $image_64 = $request->data_lama_foto_pembatas;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/dataAppBaru/pembatas/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_data_baru_foto_pembatas = 'assets/dataAppBaru/pembatas/' . $imageName;
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
        if ($request->kwh_foto_sebelum !== 'null' && $request->kwh_foto_sebelum != NULL) {
            $image_64 = $request->kwh_foto_sebelum;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/dataPemeriksaan/kwh/sebelum/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_kwh_foto_sebelum = 'assets/dataPemeriksaan/kwh/sebelum/' . $imageName;
            }
        }

        $locate_kwh_foto_sesudah = "";
        if ($request->kwh_foto_sesudah !== 'null' && $request->kwh_foto_sesudah != NULL) {
            $image_64 = $request->kwh_foto_sesudah;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/dataPemeriksaan/kwh/sesudah/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_kwh_foto_sesudah = 'assets/dataPemeriksaan/kwh/sesudah/' . $imageName;
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

            $form_baru->save();
        }

        //Terminal
        $form_pemeriksaan_terminal = FormLangsungPemeriksaanTerminal::where('forms_id', $form->id)->first();

        $locate_terminal_foto_sebelum = "";
        if ($request->terminal_foto_sebelum !== 'null' && $request->terminal_foto_sebelum != NULL) {
            $image_64 = $request->terminal_foto_sebelum;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/dataPemeriksaan/terminal/sebelum/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_terminal_foto_sebelum = 'assets/dataPemeriksaan/terminal/sebelum/' . $imageName;
            }
        }

        $locate_terminal_foto_sesudah = "";
        if ($request->terminal_foto_sesudah !== 'null' && $request->terminal_foto_sesudah != NULL) {
            $image_64 = $request->terminal_foto_sesudah;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/dataPemeriksaan/terminal/sesudah/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_terminal_foto_sesudah = 'assets/dataPemeriksaan/terminal/sesudah/' . $imageName;
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

            $form_baru->save();
        }

        // Pemeriksaan Pelindung KWH Meter
        $form_pemeriksaan_pelindung_kwh = FormLangsungPemeriksaanPelindungKwh::where('forms_id', $form->id)->first();

        $locate_pelindung_kwh_foto_sebelum = "";
        if ($request->pelindung_kwh_foto_sebelum !== 'null' && $request->pelindung_kwh_foto_sebelum != NULL) {
            $image_64 = $request->pelindung_kwh_foto_sebelum;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/dataPemeriksaan/pelindungkwh/sebelum/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_pelindung_kwh_foto_sebelum = 'assets/dataPemeriksaan/pelindungkwh/sebelum/' . $imageName;
            }
        }

        $locate_pelindung_kwh_foto_sesudah = "";
        if ($request->pelindung_kwh_foto_sesudah !== 'null' && $request->pelindung_kwh_foto_sesudah != NULL) {
            $image_64 = $request->pelindung_kwh_foto_sesudah;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/dataPemeriksaan/pelindungkwh/sesudah/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_pelindung_kwh_foto_sesudah = 'assets/dataPemeriksaan/pelindungkwh/sesudah/' . $imageName;
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

            $form_baru->save();
        }

        // Pemeriksaan Pelindung Busbar
        $form_pemeriksaan_pelindung_busbar = FormLangsungPemeriksaanPelindungBusBar::where('forms_id', $form->id)->first();

        $locate_busbar_foto_sebelum = "";
        if ($request->busbar_foto_sebelum !== 'null' && $request->busbar_foto_sebelum != NULL) {
            $image_64 = $request->busbar_foto_sebelum;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/dataPemeriksaan/terminal/sebelum/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_busbar_foto_sebelum = 'assets/dataPemeriksaan/terminal/sebelum/' . $imageName;
            }
        }

        $locate_busbar_foto_sesudah = "";
        if ($request->busbar_foto_sesudah !== 'null' && $request->busbar_foto_sesudah != NULL) {
            $image_64 = $request->busbar_foto_sesudah;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/dataPemeriksaan/terminal/sesudah/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_busbar_foto_sesudah = 'assets/dataPemeriksaan/terminal/sesudah/' . $imageName;
            }
        }

        if (empty($form_pemeriksaan_pelindung_busbar)) {
            $form_pemeriksaan_pelindung_busbar = FormLangsungPemeriksaanPelindungKwh::create([
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

            $form_baru->save();
        }

        // Pemeriksaan Papan OK
        $form_pemeriksaan_papan_ok = FormLangsungPemeriksaanPapanOk::where('forms_id', $form->id)->first();

        $locate_papan_ok_foto_sebelum = "";
        if ($request->papan_ok_foto_sebelum !== 'null' && $request->papan_ok_foto_sebelum != NULL) {
            $image_64 = $request->papan_ok_foto_sebelum;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/dataPemeriksaan/papan/sebelum/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_papan_ok_foto_sebelum = 'assets/dataPemeriksaan/papan/sebelum/' . $imageName;
            }
        }

        $locate_papan_ok_foto_sesudah = "";
        if ($request->papan_ok_foto_sesudah !== 'null' && $request->papan_ok_foto_sesudah != NULL) {
            $image_64 = $request->papan_ok_foto_sesudah;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/dataPemeriksaan/papan/sesudah/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_papan_ok_foto_sesudah = 'assets/dataPemeriksaan/papan/sesudah/' . $imageName;
            }
        }

        if (empty($form_pemeriksaan_papan_ok)) {
            $form_pemeriksaan_papan_ok = FormLangsungPemeriksaanPelindungKwh::create([
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

            $form_baru->save();
        }

        // Pemeriksaan MCB
        $form_pemeriksaan_mcb = FormLangsungPemeriksaanPenutupMcb::where('forms_id', $form->id)->first();

        $locate_mcb_foto_sebelum = "";
        if ($request->mcb_foto_sebelum !== 'null' && $request->mcb_foto_sebelum != NULL) {
            $image_64 = $request->mcb_foto_sebelum;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/dataPemeriksaan/papan/sebelum/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_mcb_foto_sebelum = 'assets/dataPemeriksaan/papan/sebelum/' . $imageName;
            }
        }

        $locate_mcb_foto_sesudah = "";
        if ($request->mcb_foto_sesudah !== 'null' && $request->mcb_foto_sesudah != NULL) {
            $image_64 = $request->mcb_foto_sesudah;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/dataPemeriksaan/papan/sesudah/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_mcb_foto_sesudah = 'assets/dataPemeriksaan/papan/sesudah/' . $imageName;
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


            $form_baru->save();
        }











        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
