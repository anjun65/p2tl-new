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
        $item = SerahTerima::where('works_id', $id)->get();

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


        view()->share([
            'item' => $item,
        ]);

        $pdf = PDF::loadView('admin.serah-terima.pdf', [
            'item' => $item,
        ])->setPaper('a4');

        return $pdf->stream();
    }
}