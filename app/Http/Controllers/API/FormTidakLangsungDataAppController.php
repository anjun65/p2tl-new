<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormTidakLangsungDataApp;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Storage;

class FormTidakLangsungDataAppController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'forms_id' => ['nullable'],
            'merk' => ['nullable'],
            'no_seri' => ['nullable'],
            'rating_arus' => ['nullable'],
            'kwh_merk' => ['nullable'],
            'kwh_no_reg' => ['nullable'],
            'kwh_no_seri' => ['nullable'],
            'kwh_tahun_buat' => ['nullable'],
            'kwh_konstanta' => ['nullable'],
            'kwh_class' => ['nullable'],
            'kwh_rating_arus' => ['nullable'],
            'kwh_tegangan_nominal' => ['nullable'],
            'kwh_stand_mtr_lbp' => ['nullable'],
            'kwh_stand_mtr_bp' => ['nullable'],
            'kwh_stand_total' => ['nullable'],
            'kwh_stand_kvarh' => ['nullable'],
            'ct_merk' => ['nullable'],
            'ct_cls' => ['nullable'],
            'ct_rasio' => ['nullable'],
            'ct_burden' => ['nullable'],
            'pt_merk' => ['nullable'],
            'pt_cls' => ['nullable'],
            'pt_rasio' => ['nullable'],
            'file_alat_pembatas' => ['nullable', 'image'],
            'file_kwh_meter' => ['nullable', 'image'],
            'file_trafo_arus' => ['nullable', 'image'],
            'file_trafo_tegangan' => ['nullable', 'image'],
            'file_kubikel' => ['nullable', 'image'],
            'file_box_app' => ['nullable', 'image'],

        ]);

        $form = FormTidakLangsungDataApp::where('works_id', $request->works_id)->first();
        
        $new_file_alat_pembatas = '';
        $new_file_kwh_meter = '';
        $new_file_trafo_arus = '';
        $new_file_trafo_tegangan = '';
        $new_file_kubikel = '';
        $new_file_box_app = '';

        if($request->file_alat_pembatas)
        {
            $new_file_alat_pembatas = Storage::putFileAs('public/assets/form_tidak_langsung/alat_pembatas', $request->file_alat_pembatas, 'file_pembatas_'.$request->forms_id.'.'.$request->file_alat_pembatas->getClientOriginalExtension());
        }

        if($request->file_kwh_meter)
        {
            $new_file_kwh_meter = Storage::putFileAs('public/assets/form_tidak_langsung/kwh_meter', $request->file_kwh_meter, 'file_kwh_meter_'.$request->forms_id.'.'.$request->file_kwh_meter->getClientOriginalExtension());
        }

        if($request->file_trafo_arus)
        {
            $new_file_trafo_arus = Storage::putFileAs('public/assets/form_tidak_langsung/trafo_arus', $request->file_trafo_arus, 'file_trafo_arus_'.$request->forms_id.'.'.$request->file_trafo_arus->getClientOriginalExtension());
        }
        
        if($request->file_trafo_tegangan)
        {
            $new_file_trafo_tegangan = Storage::putFileAs('public/assets/form_tidak_langsung/trafo_tegangan', $request->file_trafo_tegangan, 'file_trafo_tegangan_'.$request->forms_id.'.'.$request->file_trafo_tegangan->getClientOriginalExtension());
        }
        
        if($request->file_kubikel)
        {
            $new_file_kubikel = Storage::putFileAs('public/assets/form_tidak_langsung/kubikel', $request->file_kubikel, 'file_kubikel_'.$request->forms_id.'.'.$request->file_kubikel->getClientOriginalExtension());
        }

        if($request->file_box_app)
        {
            $new_file_box_app = Storage::putFileAs('public/assets/form_tidak_langsung/box_app', $request->file_box_app, 'file_box_app_'.$request->forms_id.'.'.$request->file_box_app->getClientOriginalExtension());
        }
        

        if (empty($form)){
            $form = FormTidakLangsungDataApp::create([
                'forms_id' => $request->forms_id,
                'merk' => $request->merk,
                'no_seri' => $request->no_seri,
                'rating_arus' => $request->rating_arus,
                'kwh_merk' => $request->kwh_merk,
                'kwh_no_reg' => $request->kwh_no_reg,
                'kwh_no_seri' => $request->kwh_no_seri,
                'kwh_tahun_buat' => $request->kwh_tahun_buat,
                'kwh_konstanta' => $request->kwh_konstanta,
                'kwh_class' => $request->kwh_class,
                'kwh_rating_arus' => $request->kwh_rating_arus,
                'kwh_tegangan_nominal' => $request->kwh_tegangan_nominal,
                'kwh_stand_mtr_lbp' => $request->kwh_stand_mtr_lbp,
                'kwh_stand_mtr_bp' => $request->kwh_stand_mtr_bp,
                'kwh_stand_total' => $request->kwh_stand_total,
                'kwh_stand_kvarh' => $request->kwh_stand_kvarh,
                'ct_merk' => $request->ct_merk,
                'ct_cls' => $request->ct_cls,
                'ct_rasio' => $request->ct_rasio,
                'ct_burden' => $request->ct_burden,
                'pt_merk' => $request->pt_merk,
                'pt_cls' => $request->pt_cls,
                'pt_rasio' => $request->pt_rasio,
                'file_alat_pembatas' => $new_file_alat_pembatas,
                'file_kwh_meter' => $new_file_kwh_meter,
                'file_trafo_arus' => $new_file_trafo_arus,
                'file_trafo_tegangan' => $new_file_trafo_tegangan,
                'file_kubikel' => $new_file_kubikel,
                'file_box_app' => $new_file_box_app,
            ]);
        } else {
            $form->forms_id = $request->forms_id;
            $form->merk = $request->merk;
            $form->no_seri = $request->no_seri;
            $form->rating_arus = $request->rating_arus;
            $form->kwh_merk = $request->kwh_merk;
            $form->kwh_no_reg = $request->kwh_no_reg;
            $form->kwh_no_seri = $request->kwh_no_seri;
            $form->kwh_tahun_buat = $request->kwh_tahun_buat;
            $form->kwh_konstanta = $request->kwh_konstanta;
            $form->kwh_class = $request->kwh_class;
            $form->kwh_rating_arus = $request->kwh_rating_arus;
            $form->kwh_tegangan_nominal = $request->kwh_tegangan_nominal;
            $form->kwh_stand_mtr_lbp = $request->kwh_stand_mtr_lbp;
            $form->kwh_stand_mtr_bp = $request->kwh_stand_mtr_bp;
            $form->kwh_stand_total = $request->kwh_stand_total;
            $form->kwh_stand_kvarh = $request->kwh_stand_kvarh;
            $form->ct_merk = $request->ct_merk;
            $form->ct_cls = $request->ct_cls;
            $form->ct_rasio = $request->ct_rasio;
            $form->ct_burden = $request->ct_burden;
            $form->pt_merk = $request->pt_merk;
            $form->pt_cls = $request->pt_cls;
            $form->pt_rasio = $request->pt_rasio;
            $form->file_alat_pembatas = $new_file_alat_pembatas;
            $form->file_kwh_meter = $new_file_kwh_meter;
            $form->file_trafo_arus = $new_file_trafo_arus;
            $form->file_trafo_tegangan = $new_file_trafo_tegangan;
            $form->file_kubikel = $new_file_kubikel;
            $form->file_box_app = $new_file_box_app;  
            
            $form->save();
        }
        
        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
