<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormLangsung;
use App\Helpers\ResponseFormatter;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FormLangsungController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_saksi' => ['required'],
            'alamat_saksi' => ['required'],
            'nomor_identitas' => ['required'],
            'file' => ['required','image','max:2048'],
            'no_telpon_saksi' => ['required'],
        ]);

        
        $form = FormLangsung::where('works_id', $request->works_id)->first();
        
        if (empty($form)){
            $form = FormLangsung::create([
                'works_id' => $request->works_id,
                'regus_id' => $request->regus_id,
                'nama_saksi' => $request->nama_saksi,
                'alamat_saksi' => $request->alamat_saksi,
                'nomor_identitas' => $request->nomor_identitas,
                // 'file' => $request->file_nomor_identitas->store('assets/saksi', 'public'),
                'file_nomor_identitas' => Storage::putFileAs('public/assets/saksi', $request->file, 'identitas_saksi_'.$request->nama_saksi.'.'.$request->file->getClientOriginalExtension()),
                'no_telpon_saksi' => $request->no_telpon_saksi,
            ]);
        } else {
            $form->works_id = $request->works_id;
            $form->regus_id = $request->regus_id;
            $form->nama_saksi = $request->nama_saksi;
            $form->alamat_saksi = $request->alamat_saksi;
            $form->nomor_identitas = $request->nomor_identitas;
            $form->file_nomor_identitas = Storage::putFileAs('public/assets/saksi', $request->file, 'identitas_saksi_'.$request->nama_saksi.'.'.$request->file->getClientOriginalExtension());
            $form->no_telpon_saksi = $request->no_telpon_saksi;            
            $form->save();
        }
        
        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }


    public function updateIdentitas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|max:2048',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(['error'=>$validator->errors()], 'Update Fails', 401);
        }

        if ($request->file('file')) {

            $file = Storage::putFileAs('public/assets/saksi', $request->file, 'identitas_saksi_'.$request->nama_saksi.'.'.$request->file->getClientOriginalExtension());

            //store your file into database
            $user->profile_photo_path = $file;
            $user->update();

            return ResponseFormatter::success([$file],'File successfully uploaded');
        }
    }
}
