<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkOrder;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Storage;

class WorkOrderController extends Controller
{
    public function all(Request $request)
    {
        $work_order = WorkOrder::all();

        if ($work_order)
            return ResponseFormatter::success(
                $work_order,
                'Data work order berhasil diambil'
            );
        else
            return ResponseFormatter::error(
                null,
                'Data work order tidak ada',
                404
            );
    }

    public function regu(Request $request)
    {
        $work_order = WorkOrder::where('regus_id', $request->regus_id)->where('status', '=', 'OPEN')->get();

        if ($work_order)
            return ResponseFormatter::success(
                $work_order,
                'Data work order berhasil diambil'
            );
        else
            return ResponseFormatter::error(
                null,
                'Data work order tidak ada',
                404
            );
    }

    public function historyRegu(Request $request)
    {

        if ($request->regus_id) {
            $work_order = WorkOrder::query()->where('regus_id', $request->regus_id)->where('status', '=', 'Close');

            if ($work_order)
                return ResponseFormatter::success(
                    $work_order->paginate(1),
                    'Data work order berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data work order tidak ada',
                    404
                );
        }
    }

    public function show(Request $request)
    {
        $work_order = WorkOrder::find($request->id);

        if ($work_order)
            return ResponseFormatter::success(
                $work_order,
                'Data berhasil diambil'
            );
        else
            return ResponseFormatter::error(
                null,
                'Data tidak ada',
                404
            );
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => ['required'],
            'keterangan_p2tl' => ['required', 'string', 'max:255'],

            'image' => ['required', 'image'],
            'video' => ['required', 'mimes:mp4,mov,ogg,qt'],
        ]);


        $workorder = WorkOrder::find($request->id);

        $new_image = Storage::putFileAs('public/assets/TO/', $request->image, 'foto_tkp_' . $request->id . '.' . $request->image->getClientOriginalExtension());
        $new_video = Storage::putFileAs('public/assets/TO/', $request->video, 'video_tkp_' . $request->id . '.' . $request->video->getClientOriginalExtension());

        $workorder->update([
            'keterangan_p2tl' => $request->keterangan_p2tl,
            'image' => $new_image,
            'video' => $new_video,
        ]);

        return ResponseFormatter::success($workorder, 'Berhasil ditambahkan');
    }


    public function petugas(Request $request)
    {
        $request->validate([
            'id_pelanggan' => ['required'],
            'regus_id' => ['required'],
            'nama_pelanggan' => ['required', 'string', 'max:255'],
            'keterangan_p2tl' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'latitude' => ['required', 'string', 'max:255'],
            'longitude' => ['required', 'string', 'max:255'],
            'jenis_p2tl' => ['required', 'string'],
            'tarif' => ['required', 'string'],
            'daya' => ['required', 'string'],
            'rbm' => ['required', 'string'],
            'lgkh' => ['required', 'string'],
            'fkm' => ['required', 'string'],
            'P1' => ['nullable', 'string'],
            'P2' => ['nullable', 'string'],
            'P3' => ['nullable', 'string'],
            'P4' => ['nullable', 'string'],
            'P5' => ['nullable', 'string'],
            'P6' => ['nullable', 'string'],
            'P7' => ['nullable', 'string'],
            'P8' => ['nullable', 'string'],
            'P9' => ['nullable', 'string'],
            'P10' => ['nullable', 'string'],
            // 'pendamping' => ['nullable', 'string'],
            'image' => ['required', 'image'],
            'video' => ['required', 'mimes:mp4,mov,ogg,qt'],
        ]);


        $new_file_image = '';
        $new_file_video = '';

        if ($request->new_file_image) {
            $new_file_image = Storage::putFileAs('public/assets/WO/image', $request->image, 'image_' . $request->image . '.' . $request->image->getClientOriginalExtension());
        }

        if ($request->new_file_video) {
            $new_file_video = Storage::putFileAs('public/assets/WO/video', $request->video, 'video_' . $request->video . '.' . $request->video->getClientOriginalExtension());
        }

        $workorder = WorkOrder::create([
            'id_pelanggan' => $request->id_pelanggan,
            'regus_id' => $request->regus_id,
            'nama_pelanggan' => $request->nama_pelanggan,
            'keterangan_p2tl' => $request->keterangan_p2tl,
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'jenis_p2tl' => $request->jenis_p2tl,
            'tarif' => $request->tarif,
            'daya' => $request->daya,
            'rbm' => $request->rbm,
            'lgkh' => $request->lgkh,
            'fkm' => $request->fkm,
            'P1' => $request->P1,
            'P2' => $request->P2,
            'P3' => $request->P3,
            'P4' => $request->P4,
            'P5' => $request->P5,
            'P6' => $request->P6,
            'P7' => $request->P7,
            'P8' => $request->P8,
            'P9' => $request->P9,
            'P10' => $request->P10,
            // 'pendamping1_id' => $request->pendamping,
            'image' => $new_file_image,
            'video' => $new_file_video,
        ]);

        return ResponseFormatter::success($workorder, 'Berhasil ditambahkan');
    }


    public function labor(Request $request)
    {
        $work_order = WorkOrder::where('labor', true)->where('status', 'OPEN')->get();

        if ($work_order)
            return ResponseFormatter::success(
                $work_order,
                'Data work order berhasil diambil'
            );
        else
            return ResponseFormatter::error(
                null,
                'Data work order tidak ada',
                404
            );
    }
}
