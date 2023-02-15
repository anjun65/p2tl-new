<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormTidakLangsung;
use App\Models\FormTidakLangsungDataApp;
use App\Helpers\ResponseFormatter;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewFormTidakLangsungController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'works_id' => ['required'],
            'nama_saksi' => ['nullable'],
            'alamat_saksi' => ['nullable'],
            'nomor_identitas' => ['nullable'],
            'pekerjaan' => ['nullable'],
            'no_telpon_saksi' => ['nullable'],
            'file_nomor_identitas' => ['nullable'],

            'data_tegangan_tersambung' => ['required'],
            'data_jenis_pengukuran' => ['required'],
            'data_tempat_kedudukan' => ['required'],
            'pembatas_jenis' => ['required'],
            'pembatas_merk' => ['required'],
            'pembatas_rating_arus' => ['required'],
            'pembatas_foto_pembatas' => ['required'],
            'kwh_merk' => ['required'],
            'kwh_no_reg' => ['required'],
            'kwh_no_seri' => ['required'],
            'kwh_tahun' => ['required'],
            'kwh_konstanta' => ['required'],
            'kwh_class' => ['required'],
            'kwh_rating_arus' => ['required'],
            'kwh_tegangan' => ['required'],
            'kwh_lbp' => ['required'],
            'kwh_bp' => ['required'],
            'kwh_total' => ['required'],
            'kwh_kvarh' => ['required'],
            'kwh_foto' => ['required'],

            'ct_merk' => ['required'],
            'ct_cls' => ['required'],
            'ct_rasio' => ['required'],
            'ct_burden' => ['required'],
            'ct_foto' => ['required'],
            'pt_merk' => ['required'],
            'pt_cls' => ['required'],
            'pt_rasio' => ['required'],
            'pt_burden' => ['required'],
            'pt_foto' => ['required'],

            'kubikel_merk' => ['required'],
            'kubikel_type' => ['required'],
            'kubikel_no_seri' => ['required'],
            'kubikel_tahun' => ['required'],
            'kubikel_foto' => ['required'],

            'box_app_merk' => ['required'],
            'box_app_type' => ['required'],
            'box_app_no_seri' => ['required'],
            'box_app_tahun' => ['required'],
            'box_app_foto' => ['required'],

        ]);

        //Saksi

        $form = FormTidakLangsung::where('works_id', $request->works_id)->first();

        $locate_file_nomor_identitas = "";
        if ($request->file_nomor_identitas !== 'null' && $request->file_nomor_identitas != NULL) {
            $image_64 = $request->file_nomor_identitas;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/tidaklangsung/saksi/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_file_nomor_identitas = 'assets/tidaklangsung/saksi/' . $imageName;
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
            $form = FormTidakLangsung::create([
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


        //Form Data App

        $form_app = FormTidakLangsungDataApp::where('works_id', $request->works_id)->first();

        $locate_pembatas_foto_pembatas = "";
        if ($request->pembatas_foto_pembatas !== 'null' && $request->pembatas_foto_pembatas != NULL) {
            $image_64 = $request->pembatas_foto_pembatas;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/tidaklangsung/dataapp/pembatas/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_pembatas_foto_pembatas = 'assets/tidaklangsung/dataapp/pembatas/' . $imageName;
            }
        }


        $locate_kwh_foto = "";
        if ($request->kwh_foto !== 'null' && $request->kwh_foto != NULL) {
            $image_64 = $request->kwh_foto;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/tidaklangsung/dataapp/pembatas/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_kwh_foto = 'assets/tidaklangsung/dataapp/pembatas/' . $imageName;
            }
        }

        $locate_ct_foto = "";
        if ($request->ct_foto !== 'null' && $request->ct_foto != NULL) {
            $image_64 = $request->ct_foto;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/tidaklangsung/dataapp/ct/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_ct_foto = 'assets/tidaklangsung/dataapp/ct/' . $imageName;
            }
        }

        $locate_pt_foto = "";
        if ($request->pt_foto !== 'null' && $request->pt_foto != NULL) {
            $image_64 = $request->pt_foto;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/tidaklangsung/dataapp/pt/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_pt_foto = 'assets/tidaklangsung/dataapp/pt/' . $imageName;
            }
        }

        $locate_kubikel_foto = "";
        if ($request->kubikel_foto !== 'null' && $request->kubikel_foto != NULL) {
            $image_64 = $request->kubikel_foto;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/tidaklangsung/dataapp/pt/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_kubikel_foto = 'assets/tidaklangsung/dataapp/pt/' . $imageName;
            }
        }

        $locate_box_app_foto = "";
        if ($request->box_app_foto !== 'null' && $request->box_app_foto != NULL) {
            $image_64 = $request->box_app_foto;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . $extension;
            $file = Storage::disk('public')->put('assets/tidaklangsung/dataapp/pt/' . $imageName, base64_decode($image));

            if ($file) {
                $locate_box_app_foto = 'assets/tidaklangsung/dataapp/pt/' . $imageName;
            }
        }


        if (empty($form)) {
            $form = FormTidakLangsungDataApp::create([
                'works_id' => $request->works_id,
                'data_tegangan_tersambung' => $request->data_tegangan_tersambung,
                'data_jenis_pengukuran' => $request->data_jenis_pengukuran,
                'data_tempat_kedudukan' => $request->data_tempat_kedudukan,
                'merk' => $request->pembatas_merk,
                'no_seri' => $request->pembatas_jenis,
                'rating_arus' => $request->pembatas_rating_arus,
                'kwh_merk' => $request->kwh_merk,
                'kwh_no_reg' => $request->kwh_no_reg,
                'kwh_no_seri' => $request->kwh_no_seri,
                'kwh_tahun_buat' => $request->kwh_tahun,
                'kwh_konstanta' => $request->kwh_konstanta,
                'kwh_class' => $request->kwh_class,
                'kwh_rating_arus' => $request->kwh_rating_arus,
                'kwh_tegangan_nominal' => $request->kwh_tegangan,
                'kwh_stand_mtr_lbp' => $request->kwh_lbp,
                'kwh_stand_mtr_bp' => $request->kwh_bp,
                'kwh_stand_total' => $request->kwh_total,
                'kwh_stand_kvarh' => $request->kwh_kvarh,
                'ct_merk' => $request->ct_merk,
                'ct_cls' => $request->ct_cls,
                'ct_rasio' => $request->ct_rasio,
                'ct_burden' => $request->ct_burden,
                'pt_merk' => $request->pt_merk,
                'pt_cls' => $request->pt_cls,
                'pt_rasio' => $request->pt_rasio,
                'pt_burden' => $request->pt_burden,
                'kubikel_merk' => $request->kubikel_merk,
                'kubikel_type' => $request->kubikel_type,
                'kubikel_no_seri' => $request->kubikel_no_seri,
                'kubikel_tahun' => $request->kubikel_tahun,
                'box_app_merk' => $request->box_app_merk,
                'box_app_type' => $request->box_app_type,
                'box_app_no_seri' => $request->box_app_no_seri,
                'box_app_tahun' => $request->box_app_tahun,
                'file_alat_pembatas' => $locate_pembatas_foto_pembatas,
                'file_kwh_meter' => $locate_kwh_foto,
                'file_trafo_arus' => $locate_ct_foto,
                'file_trafo_tegangan' => $locate_pt_foto,
                'file_kubikel' => $locate_kubikel_foto,
                'file_box_app' => $locate_box_app_foto,

            ]);
        } else {
            $form->works_id = $request->works_id;

            $form->data_tegangan_tersambung = $request->data_tegangan_tersambung;
            $form->data_jenis_pengukuran = $request->data_jenis_pengukuran;
            $form->data_tempat_kedudukan = $request->data_tempat_kedudukan;
            $form->merk = $request->pembatas_merk;
            $form->no_seri = $request->pembatas_jenis;
            $form->rating_arus = $request->pembatas_rating_arus;
            $form->kwh_merk = $request->kwh_merk;
            $form->kwh_no_reg = $request->kwh_no_reg;
            $form->kwh_no_seri = $request->kwh_no_seri;
            $form->kwh_tahun_buat = $request->kwh_tahun;
            $form->kwh_konstanta = $request->kwh_konstanta;
            $form->kwh_class = $request->kwh_class;
            $form->kwh_rating_arus = $request->kwh_rating_arus;
            $form->kwh_tegangan_nominal = $request->kwh_tegangan;
            $form->kwh_stand_mtr_lbp = $request->kwh_lbp;
            $form->kwh_stand_mtr_bp = $request->kwh_bp;
            $form->kwh_stand_total = $request->kwh_total;
            $form->kwh_stand_kvarh = $request->kwh_kvarh;
            $form->ct_merk = $request->ct_merk;
            $form->ct_cls = $request->ct_cls;
            $form->ct_rasio = $request->ct_rasio;
            $form->ct_burden = $request->ct_burden;
            $form->pt_merk = $request->pt_merk;
            $form->pt_cls = $request->pt_cls;
            $form->pt_rasio = $request->pt_rasio;
            $form->pt_burden = $request->pt_burden;
            $form->kubikel_merk = $request->kubikel_merk;
            $form->kubikel_type = $request->kubikel_type;
            $form->kubikel_no_seri = $request->kubikel_no_seri;
            $form->kubikel_tahun = $request->kubikel_tahun;
            $form->box_app_merk = $request->box_app_merk;
            $form->box_app_type = $request->box_app_type;
            $form->box_app_no_seri = $request->box_app_no_seri;
            $form->box_app_tahun = $request->box_app_tahun;

            $form->file_alat_pembatas = $locate_pembatas_foto_pembatas;
            $form->file_kwh_meter = $locate_kwh_foto;
            $form->file_trafo_arus = $locate_ct_foto;
            $form->file_trafo_tegangan = $locate_pt_foto;
            $form->file_kubikel = $locate_kubikel_foto;
            $form->file_box_app = $locate_box_app_foto;

            $form->save();
        }




        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
