<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkOrder;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\FormTidakLangsung;

class TidakLangsungController extends Controller
{
    public function generatePDF($id)
    {

        $item = WorkOrder::where('id', $id)->first();

        view()->share([
            'item' => $item,
        ]);

        $pdf = Pdf::loadView('admin.tidak-langsung.pdf', [
            'item' => $item,
        ])->setPaper('a4');

        return $pdf->stream();
    }


    public function show($id)
    {
        $item = FormTidakLangsung::where('works_id', $id)->first();

        return view('admin.form-tidak-langsung', [
            'item' => $item,
        ]);
    }
}
