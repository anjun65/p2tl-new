<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\WorkOrderController;
use App\Http\Controllers\API\FormLangsungController;
use App\Http\Controllers\API\FormLangsungAppDataBaruController;
use App\Http\Controllers\API\FormLangsungAppDataLamaController;
use App\Http\Controllers\API\FormLangsungPemeriksaanKWHController;

use App\Http\Controllers\API\FormLangsungPemeriksaanTerminalController;
use App\Http\Controllers\API\FormLangsungPemeriksaanPelindungKwh;
use App\Http\Controllers\API\FormLangsungPemeriksaanPelindungBusbar;
use App\Http\Controllers\API\FormLangsungPemeriksaanPelindungPapanOk;
use App\Http\Controllers\API\FormLangsungPemeriksaanPenutupMCB;
use App\Http\Controllers\API\FormLangsungPemeriksaanPengukuranController;
use App\Http\Controllers\API\FormLangsungWiringAppController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);


Route::get('work-order', [WorkOrderController::class, 'all']);
Route::post('work-order', [WorkOrderController::class, 'store']);


Route::post('form-langsung', [FormLangsungController::class, 'store']);
Route::post('form-langsung/file', [FormLangsungController::class, 'updateIdentitas']);
Route::post('form-langsung/data-lama', [FormLangsungAppDataLamaController::class, 'store']);
Route::post('form-langsung/data-baru', [FormLangsungAppDataBaruController::class, 'store']);
Route::post('form-langsung/data-pemeriksaan/kwh', [FormLangsungPemeriksaanKWHController::class, 'store']);

Route::post('form-langsung/data-pemeriksaan/terminal', [FormLangsungPemeriksaanTerminalController::class, 'store']);
Route::post('form-langsung/data-pemeriksaan/pelindung-kwh', [FormLangsungPemeriksaanPelindungKwh::class, 'store']);
Route::post('form-langsung/data-pemeriksaan/pelindung-busbar', [FormLangsungPemeriksaanPelindungBusbar::class, 'store']);
Route::post('form-langsung/data-pemeriksaan/papan-ok', [FormLangsungPemeriksaanPelindungPapanOk::class, 'store']);
Route::post('form-langsung/data-pemeriksaan/penutup-mcb', [FormLangsungPemeriksaanPenutupMCB::class, 'store']);


Route::post('form-langsung/data-pengukuran', [FormLangsungPemeriksaanPengukuranController::class, 'store']);
Route::post('form-langsung/data-wiring-app', [FormLangsungWiringAppController::class, 'store']);