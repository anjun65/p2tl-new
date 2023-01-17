<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkOrder;
use Illuminate\Http\Request;

class SerahTerimaController extends Controller
{
    public function show($id)
    {
        $item = WorkOrder::findorFail($id);

        return view('admin.serah-terima', [
            'item' => $item,
        ]);
    }
}
