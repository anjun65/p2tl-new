<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkOrder;
use Barryvdh\DomPDF\Facade\Pdf;

class LangsungController extends Controller
{
    public function generatePDF($id)
    {

        $item = WorkOrder::where('id', 44)->first();

        view()->share([
            'item' => $item,
        ]);

        $pdf = Pdf::loadView('admin.langsung.pdf', [
            'item' => $item,
        ])->setPaper('a4');

        return $pdf->stream();
    }
}
