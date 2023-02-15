<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\FormLangsung;
use App\Models\FormLangsungDataAppBaru;
use App\Models\FormLangsungDataAppLama;
use App\Models\FormLangsungPemeriksaanKwhMeter;
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
        $form_baru = FormLangsungDataAppBaru::where('forms_id', $form->id)->first();

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



        $form_pemeriksaan_kwh = FormLangsungPemeriksaanKwhMeter::where('forms_id', $form->id)->first();

        $locate_kwh_foto_sebelum = "";
        if ($request->kwh_foto_sebelum !== 'null' && $request->kwh_foto_sebelum != NULL) {
            $image_64 = $request->kwh_foto_sebelum;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/dataAppBaru/pembatas/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_kwh_foto_sebelum = 'assets/dataAppBaru/pembatas/' . $imageName;
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
            $file = Storage::disk('public')->put('assets/dataAppBaru/pembatas/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_kwh_foto_sesudah = 'assets/dataAppBaru/pembatas/' . $imageName;
            }
        }

        if (empty($form_pemeriksaan_kwh)) {
            $form_pemeriksaan_kwh = FormLangsungDataAppBaru::create([
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


        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
