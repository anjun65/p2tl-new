<?php

use App\Http\Controllers\Admin\FormLangsungController;
use App\Http\Controllers\Admin\Kalibrasi;
use App\Http\Controllers\Admin\LangsungController;
use App\Http\Controllers\Admin\PengambilanBarangBukti;
use App\Http\Controllers\Annev\FormLangsungController as annev;
use App\Http\Controllers\Form1Controller;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\ReguWoDetails;
use App\Http\Controllers\Admin\SerahTerimaController;
use App\Http\Controllers\Admin\TidakLangsungController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Redirect::route('login');
});


// Route::middleware([
//     'anev',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/annev/form-langsung/{id}', [annev::class, 'show'])->name('annev-form-langsung');
//     Route::put('/annev/form-langsung/{id}/edit', [annev::class, 'update'])->name('annev-edit-form-langsung');
// });

Route::middleware([
    'anev',
    config('jetstream.auth_session'),
    'verified'
])->group(
    function () {
        // Route::get('/anev/dashboard', [annev::class, 'show'])->name('annev-dashboard');
        Route::get('/anev/work-orders', function () {
            return view('annev.annev-wo');
        })->name('annev-wo');
        Route::get('/anev/form-langsung/{id}', [annev::class, 'show'])->name('annev-form-langsung');
        Route::put('/anev/form-langsung/{id}/edit', [annev::class, 'update'])->name('annev-edit-form-langsung');
    }
);

Route::middleware([
    'admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/admin/users', function () {
        return view('admin.users');
    })->name('admin-user');

    Route::get('/admin/work-orders', function () {
        return view('admin.wo');
    })->name('admin-wo');

    Route::get('/admin/regu/{pass}', ReguWoDetails::class)->name('admin-new-wo');

    Route::get('/admin/form-langsung/{id}', [FormLangsungController::class, 'show'])->name('admin-form-langsung');

    Route::get('/admin/serah-terima/{id}', [SerahTerimaController::class, 'show'])->name('admin-serah-terima');

    Route::post('/admin/serah-terima/new/{id}', [SerahTerimaController::class, 'store'])->name('serah-terima-post');
    Route::put('/admin/serah-terima/update/{id}', [SerahTerimaController::class, 'update'])->name('serah-terima-update');


    Route::get('/admin/serah-terima/pdf/{id}', [SerahTerimaController::class, 'generatePDF'])->name('serah-terima-pdf');

    Route::get('/admin/pembukaan-barang-bukti/pdf/{id}', [SerahTerimaController::class, 'generatePDF'])->name('pembukaan-pdf');

    Route::get('/admin/pengambilan-barang-bukti/pdf/{id}', [PengambilanBarangBukti::class, 'generatePDF'])->name('pengambilan-pdf');

    Route::get('/admin/kalibrasi/pdf/{id}', [Kalibrasi::class, 'generatePDF'])->name('kalibrasi-pdf');

    Route::get('/admin/langsung/pdf/{id}', [LangsungController::class, 'generatePDF'])->name('langsung-pdf');

    Route::get('/admin/tidak-langsung/pdf/{id}', [TidakLangsungController::class, 'generatePDF'])->name('langsung-pdf');

    Route::get('/admin/pelanggaran', function () {
        return view('admin.pelanggaran');
    })->name('admin-pelanggaran');


    Route::get('admin/form1/', [Form1Controller::class, 'index']);
    Route::get('admin/form2/', [Form2Controller::class, 'index']);
});


Route::middleware([
    'struktural',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/struktural/dashboard', function () {
        return view('dashboard');
    })->name('struktural-dashboard');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');

//     Route::get('/admin/users', function () {
//         return view('admin.users');
//     })->name('admin-user');

//     Route::get('/admin/work-orders', function () {
//         return view('admin.work-orders');
//     })->name('admin-wo');

//     Route::get('/admin/new', function () {
//         return view('admin.wo');
//     })->name('admin-new-wo');

//     Route::get('/admin/regu/{pass}', ReguWoDetails::class)->name('admin-new-wo');


//     Route::get('/admin/form-langsung/{id}', [FormLangsungController::class, 'show'])->name('admin-form-langsung');

//     Route::get('/admin/pelanggaran', function () {
//         return view('admin.pelanggaran');
//     })->name('admin-pelanggaran');
    

//     Route::get('/annev/form-langsung/{id}', [annev::class, 'show'])->name('annev-form-langsung');

//     Route::put('/annev/form-langsung/{id}/edit', [annev::class, 'update'])->name('annev-edit-form-langsung');


//     // Route::get('/user/work-orders', function () {
//     //     return view('user.work-orders');
//     // })->name('user-wo');

//     Route::get('admin/form1/', [Form1Controller::class, 'index']);
//     Route::get('admin/form2/', [Form2Controller::class, 'index']);
// });
