<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\ResponseFormatter;
use App\Models\FormLangsungWiringApp;

class FormLangsungWiringAppController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'forms_id' => ['required'],
            'terminal1' => ['required'],
            'terminal2' => ['required'],
            'terminal3' => ['required'],
            'terminal4' => ['required'],
            'terminal5' => ['required'],
            'terminal6' => ['required'],
            'terminal7' => ['required'],
            'terminal8' => ['required'],
            'terminal9' => ['required'],
            'terminal11' => ['required'],
            'keterangan_wiring_app' => ['required'],            
        ]);
        
        $form = FormLangsungWiringApp::where('forms_id', $request->forms_id)->first();
        
        if ($form){
            $form->update([
                'forms_id' => $request->forms_id,
                'terminal1' => $request->terminal1,
                'terminal2' => $request->terminal2,
                'terminal3' => $request->terminal3,
                'terminal4' => $request->terminal4,
                'terminal5' => $request->terminal5,
                'terminal6' => $request->terminal6,
                'terminal7' => $request->terminal7,
                'terminal8' => $request->terminal8,
                'terminal9' => $request->terminal9,
                'terminal11' => $request->terminal11,
                'keterangan_wiring_app' => $request->keterangan_wiring_app,
            ]);
        } else {
            $form = FormLangsungWiringApp::create([
                'forms_id' => $request->form1s_id,
                'arus_1' => $request->arus_1,
                'arus_2' => $request->arus_2,
                'arus_3' => $request->arus_3,
                'arus_netral' => $request->arus_netral,
                'voltase_netral_1' => $request->voltase_netral_1,
                'voltase_netral_2' => $request->voltase_netral_2,
                'voltase_netral_3' => $request->voltase_netral_3,
                'voltase_phase_1' => $request->voltase_phase_1,
                'voltase_phase_2' => $request->voltase_phase_2,
                'voltase_phase_3' => $request->voltase_phase_3,
                'cos_1' => $request->cos_1,
                'cos_2' => $request->cos_2,
                'cos_3' => $request->cos_3,
                'akurasi' => $request->akurasi,
            ]);
        }
        

        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
