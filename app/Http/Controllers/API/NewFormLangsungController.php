<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\FormLangsung;
use App\Models\FormLangsungDataAppBaru;
use App\Models\FormLangsungDataAppLama;
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
        ]);


        $form = FormLangsung::where('works_id', $request->works_id)->first();
        $form_lama = FormLangsungDataAppLama::where('forms_id', $form->id)->first();
        $form_baru = FormLangsungDataAppBaru::where('forms_id', $form->id)->first();



        $locate_file_nomor_identitas = "";
        if ($request->file_nomor_identitas != 'null' || $request->file_nomor_identitas != NULL) {
            $image_64 = $request->file_nomor_identitas;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $locate_file_nomor_identitas = Storage::putFileAs('public/assets/saksi', base64_decode($image), $imageName);
        }

        $locate_data_lama_foto_kwh_meter = "";
        if ($request->data_lama_foto_kwh_meter != 'null' || $request->data_lama_foto_kwh_meter != NULL) {
            $image_64 = $request->data_lama_foto_kwh_meter;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $locate_data_lama_foto_kwh_meter = Storage::putFileAs('public/assets/dataAppLama/kwh', base64_decode($image), $imageName);
        }

        $locate_data_lama_foto_pembatas = "";
        if ($request->data_lama_foto_pembatas != 'null' || $request->data_lama_foto_pembatas != NULL) {
            $image_64 = $request->locate_data_lama_foto_pembatas;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $locate_data_lama_foto_pembatas = Storage::putFileAs('public/assets/dataAppLama/pembatas', base64_decode($image), $imageName);
        }


        // $locate_data_baru_foto_kwh_meter = "";
        // if ($request->data_baru_foto_kwh_meter != 'null' || $request->data_baru_foto_kwh_meter != NULL) {
        //     $image = str_replace('data:image/png;base64,', '', $request->data_baru_foto_kwh_meter);
        //     $image = str_replace(' ', '+', $image);
        //     $imageName = Str::random(10) . '.' . 'png';
        //     $locate_data_lama_foto_kwh_meter = Storage::putFileAs('public/assets/dataAppBaru/pembatas', $imageName, base64_decode($image));
        // }


        // $locate_data_barufoto_pembatas = "";
        // if ($request->data_baru_foto_pembatas != 'null' || $request->data_baru_foto_pembatas != NULL) {
        //     $image = str_replace('data:image/png;base64,', '', $request->data_baru_foto_pembatas);
        //     $image = str_replace(' ', '+', $image);
        //     $imageName = Str::random(10) . '.' . 'png';
        //     $locate_data_baru_foto_pembatas = Storage::putFileAs('public/assets/dataAppBaru/pembatas', $imageName, base64_decode($image));
        // }


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
                'rating_arus_2' => $request->data_lama_alat_pembatas_merk,
                'jenis_pembatas' => $request->data_lama_rating_arus_2,
                'alat_pembatas_merk' => $request->data_lama_foto_kwh_meter,
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
            $form_lama->rating_arus_2 = $request->data_lama_alat_pembatas_merk;
            $form_lama->jenis_pembatas = $request->data_lama_rating_arus_2;
            $form_lama->alat_pembatas_merk = $request->data_lama_foto_kwh_meter;
            $form_lama->foto_pembatas = $locate_data_lama_foto_pembatas;

            $form_lama->save();
        }

        // if (empty($form_baru)) {
        //     $form_baru = FormLangsungDataAppBaru::create([
        //         'forms_id' => $form->id,
        //         'merk' => $request->data_baru_merk,
        //         'no_reg' => $request->data_baru_no_reg,
        //         'no_seri' => $request->data_baru_no_seri,
        //         'tahun_pembuatan' => $request->data_baru_tahun_pembuatan,
        //         'class' => $request->data_baru_class,
        //         'konstanta' => $request->data_baru_konstanta,
        //         'rating_arus' => $request->data_baru_rating_arus,
        //         'tegangan_nominal' => $request->data_baru_tegangan_nominal,
        //         'stand_kwh_meter' => $request->data_baru_stand_kwh_meter,
        //         'foto_kwh_meter' => $locate_data_baru_foto_kwh_meter,
        //         'rating_arus_2' => $request->data_baru_alat_pembatas_merk,
        //         'jenis_pembatas' => $request->data_baru_rating_arus_2,
        //         'alat_pembatas_merk' => $request->data_baru_foto_kwh_meter,
        //         'foto_pembatas' => $locate_data_baru_foto_pembatas,
        //     ]);
        // } else {
        //     $form_baru->forms_id = $form->id;
        //     $form_baru->merk = $request->data_baru_merk;
        //     $form_baru->no_reg = $request->data_baru_no_reg;
        //     $form_baru->no_seri = $request->data_baru_no_seri;
        //     $form_baru->tahun_pembuatan = $request->data_baru_tahun_pembuatan;
        //     $form_baru->class = $request->data_baru_class;
        //     $form_baru->konstanta = $request->data_baru_konstanta;
        //     $form_baru->rating_arus = $request->data_baru_rating_arus;
        //     $form_baru->tegangan_nominal = $request->data_baru_tegangan_nominal;
        //     $form_baru->stand_kwh_meter = $request->data_baru_stand_kwh_meter;
        //     $form_baru->foto_kwh_meter = $locate_data_baru_foto_kwh_meter;
        //     $form_baru->rating_arus_2 = $request->data_baru_alat_pembatas_merk;
        //     $form_baru->jenis_pembatas = $request->data_baru_rating_arus_2;
        //     $form_baru->alat_pembatas_merk = $request->data_baru_foto_kwh_meter;
        //     $form_baru->foto_pembatas = $locate_data_baru_foto_pembatas;

        //     $form_baru->save();
        // }

        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
