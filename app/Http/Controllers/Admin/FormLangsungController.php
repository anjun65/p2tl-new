<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormLangsung;
use Illuminate\Http\Request;

class FormLangsungController extends Controller
{
    public function show($id)
    {
        $item = FormLangsung::findorFail($id);

        return view('admin.form-langsung', [
            'item' => $item,
        ]);
    }
}
