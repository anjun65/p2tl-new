<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkOrder;
use App\Helpers\ResponseFormatter;

class WorkOrderController extends Controller
{
    public function all(Request $request)
    {
        $work_order = WorkOrder::all();

        if($work_order)
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

    public function store(Request $request)
    {
        $request->validate([
            'id' => ['required'],
            'keterangan_p2tl' => ['required', 'string', 'max:255'],
        ]);

        
        $workorder = WorkOrder::find($request->id);
        
        $workorder->update([
            'keterangan_p2tl' => $request->keterangan_p2tl,
        ]);

        return ResponseFormatter::success($workorder, 'Berhasil ditambahkan');
    }
}
