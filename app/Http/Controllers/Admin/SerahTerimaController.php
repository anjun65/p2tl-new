<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SerahTerima;
use Illuminate\Http\Request;
use PDF;

class SerahTerimaController extends Controller
{
    public function show($id)
    {
        $item = WorkOrder::findorFail($id);

        return view('admin.serah-terima', [
            'item' => $item,
        ]);
    }

    public function generatePDF($id)
    {
        $item = SerahTerima::findorFail($id);

        view()->share([
            'item' => $item,
        ]);

        $pdf = PDF::loadView('pages.admin.transaction.pdf', [
            'item' => $item,
        ])->setPaper('a4');

        return $pdf->stream();
    }
}
