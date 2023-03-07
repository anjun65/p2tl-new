<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormLangsung;
use Illuminate\Http\Request;

class FormLangsungController extends Controller
{
    public function show($id)
    {
        $item = FormLangsung::where('works_id', $id)->get();

        return view('admin.form-langsung', [
            'item' => $item,
        ]);
    }
}
