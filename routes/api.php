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

use App\Http\Controllers\API\FormLangsungHasilPemeriksaanController;

use App\Http\Controllers\API\FormTidakLangsung;
use App\Http\Controllers\API\FormTidakLangsungDataAppController;
use App\Http\Controllers\API\FormTidakLangsungDataPemeriksaanPelindungKwhController;
use App\Http\Controllers\API\FormTidakLangsungDataPemeriksaanPelindungCtController;
use App\Http\Controllers\API\FormTidakLangsungDataPemeriksaanPelindungSegelMetrologiController;
use App\Http\Controllers\API\FormTidakLangsungDataPemeriksaanTutupTerminalController;
use App\Http\Controllers\API\FormTidakLangsungDataPemeriksaanBoxAmrController;
use App\Http\Controllers\API\FormTidakLangsungDataPemeriksaanKubikelController;
use App\Http\Controllers\API\FormTidakLangsungDataPemeriksaanPintuGarduCtController;
use App\Http\Controllers\API\FormTidakLangsungDataPemeriksaanTerminalCtController;

use App\Http\Controllers\API\KalibrasiDataKwhMeterController;
use App\Http\Controllers\API\KalibrasiKwhMeterController;
use App\Http\Controllers\API\KalibrasiDataKwhMeterLanjutanController;
use App\Http\Controllers\API\KalibrasiUjiAkurasiController;


use App\Http\Controllers\API\BarangBuktiController;
use App\Http\Controllers\API\PembukaanBarangBuktiController;


use App\Http\Controllers\API\NewFormLangsungController;
use App\Http\Controllers\API\NewFormTidakLangsungController;




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

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', [UserController::class, 'logout']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [UserController::class, 'login']);

Route::post('register', [UserController::class, 'register']);


Route::get('work-order', [WorkOrderController::class, 'all']);
Route::post('work-order/regu', [WorkOrderController::class, 'regu']);

Route::post('work-order/history/regu', [WorkOrderController::class, 'historyRegu']);
Route::post('work-order', [WorkOrderController::class, 'store']);


Route::post('work-order/petugas', [WorkOrderController::class, 'petugas']);

Route::post('form-langsung/spesifik', [FormLangsungController::class, 'show']);


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

Route::post('form-langsung/hasil-pemeriksaan', [FormLangsungHasilPemeriksaanController::class, 'store']);

Route::post('form-tidak-langsung', [FormTidakLangsung::class, 'store']);

Route::post('form-tidak-langsung/data-app', [FormTidakLangsungDataAppController::class, 'store']);

Route::post('form-tidak-langsung/data-pemeriksaan/pelindung-kwh', [FormTidakLangsungDataPemeriksaanPelindungKwhController::class, 'store']);
Route::post('form-tidak-langsung/data-pemeriksaan/pelindung-ct', [FormTidakLangsungDataPemeriksaanPelindungCtController::class, 'store']);
Route::post('form-tidak-langsung/data-pemeriksaan/segel', [FormTidakLangsungDataPemeriksaanPelindungSegelMetrologiController::class, 'store']);
Route::post('form-tidak-langsung/data-pemeriksaan/tutup-terminal', [FormTidakLangsungDataPemeriksaanTutupTerminalController::class, 'store']);
Route::post('form-tidak-langsung/data-pemeriksaan/box-amr', [FormTidakLangsungDataPemeriksaanBoxAmrController::class, 'store']);
Route::post('form-tidak-langsung/data-pemeriksaan/kubikel', [FormTidakLangsungDataPemeriksaanKubikelController::class, 'store']);
Route::post('form-tidak-langsung/data-pemeriksaan/terminal-ct', [FormTidakLangsungDataPemeriksaanTerminalCtController::class, 'store']);
Route::post('form-tidak-langsung/data-pemeriksaan/pintu-gardu', [FormTidakLangsungDataPemeriksaanPintuGarduCtController::class, 'store']);

Route::post('kalibrasi/saksi', [KalibrasiKwhMeterController::class, 'store']);
Route::post('kalibrasi/data-kwh', [KalibrasiDataKwhMeterController::class, 'store']);
Route::post('kalibrasi/data-kwh-lanjutan', [KalibrasiDataKwhMeterLanjutanController::class, 'store']);
Route::post('kalibrasi/akurasi', [KalibrasiUjiAkurasiController::class, 'store']);

Route::post('barang-bukti', [BarangBuktiController::class, 'store']);
Route::post('barang-bukti/get', [BarangBuktiController::class, 'show']);
Route::post('barang-bukti/pembukaan', [PembukaanBarangBuktiController::class, 'store']);

Route::get('labor/work-order', [WorkOrderController::class, 'labor']);


Route::post('new-form-langsung', [NewFormLangsungController::class, 'store']);
Route::post('new-form-tidak-langsung', [NewFormTidakLangsungController::class, 'store']);
Route::post('new-kalibrasi', [KalibrasiKwhMeterController::class, 'store']);
