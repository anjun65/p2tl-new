<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BarangBukti;
use App\Models\SerahTerima;
use Illuminate\Http\Request;
use resources\lang\id\date;
use PDF;

class SerahTerimaController extends Controller
{
    public function show($id)
    {
        $item = BarangBukti::where('works_id', $id)->first();



        return view('admin.serah-terima', [
            'item' => $item,
        ]);
    }

    // public function store(Request $request)
    // {
    //     $item = SerahTerima::create([
    //         'works_id' => $request->works_id,
    //         'tanggal_serah_terima' => $request->tanggal_serah_terima,
    //     ]);

    //     return route('admin-serah-terima', $request->works_id);
    // }

    // public function update($id, Request $request)
    // {
    //     $item = SerahTerima::where('works_id', $id);

    //     $item->update([
    //         'works_id' => $request->works_id,
    //         'tanggal_serah_terima' => $request->tanggal_serah_terima,
    //     ]);

    //     return view('admin.serah-terima', [
    //         'item' => $item,
    //     ]);
    // }

    public function generatePDF($id)
    {
        $item = SerahTerima::with('work')->where('id', $id)->first();

        // return view('admin.serah-terima.pdf', [
        //     'item' => $item,
        // ]);


        view()->share([
            'item' => $item,
        ]);

        $pdf = PDF::loadView('admin.serah-terima.pdf', [
            'item' => $item,
        ])->setPaper('a4');

        return $pdf->stream();
    }
}
