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
        $work_order = WorkOrder::with('jam_nyala')->get();

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
        $work_order = WorkOrder::with('jam_nyala')->where('regus_id', $request->regus_id)->get();

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
            'video' => ['required', 'video'],
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
}
