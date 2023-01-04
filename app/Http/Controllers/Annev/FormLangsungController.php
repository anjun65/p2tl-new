<?php

namespace App\Http\Controllers\Annev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormLangsung;
use App\Models\WorkOrder;

class FormLangsungController extends Controller
{
    public function show($id)
    {
        $item = FormLangsung::findorFail($id);

        return view('annev.form-langsung', [
            'item' => $item,
        ]);
    }

    public function update($id, Request $request)
    {
        $status_pelanggaran = $request->status_pelanggaran;

        $item = FormLangsung::find($id)->first();

        $work = WorkOrder::find($item->id)->first();

        $work->update([
            'status_pelanggaran' => $status_pelanggaran,
        ]);

        return redirect(route('annev-form-langsung', $id));
    }
}
