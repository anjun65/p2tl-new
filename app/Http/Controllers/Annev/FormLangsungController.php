<?php

namespace App\Http\Controllers\Annev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormLangsung;
use App\Models\FormTidakLangsung;
use App\Models\WorkOrder;

class FormLangsungController extends Controller
{
    public function show($id)
    {
        $item = FormLangsung::where('works_id', $id)->first();

        return view('annev.form-langsung', [
            'item' => $item,
        ]);
    }

    public function update($id, Request $request)
    {
        $status_pelanggaran = $request->status_pelanggaran;

        $item = FormLangsung::find($id)->first();

        $work = WorkOrder::where('id', $item->works_id)->first();

        $work->update([
            'status_pelanggaran' => $status_pelanggaran,
            'jumlah_ts_rp' => $request->jumlah_ts_rp,
            'jumlah_ts_kwh' => $request->jumlah_ts_kwh,
        ]);

        return redirect(route('annev-form-langsung', $work->id));
    }

    public function tidakShow($id)
    {
        $item = FormTidakLangsung::where('works_id', $id)->first();

        return view('annev.form-tidak-langsung', [
            'item' => $item,
        ]);
    }

    public function tidakUpdate($id, Request $request)
    {
        $status_pelanggaran = $request->status_pelanggaran;

        $item = FormTidakLangsung::find($id)->first();

        $work = WorkOrder::where('id', $item->works_id)->first();


        $work->update([
            'status_pelanggaran' => $status_pelanggaran,
            'jumlah_ts_rp' => $request->jumlah_ts_rp,
            'jumlah_ts_kwh' => $request->jumlah_ts_kwh,
        ]);

        return redirect(route('annev-form-tidak-langsung', $work->id));
    }
}
