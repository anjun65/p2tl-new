<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\WorkOrderController;
use App\Http\Controllers\API\FormLangsungController;
use App\Http\Controllers\API\FormLangsungDataAppBaruController;
use App\Http\Controllers\API\FormLangsungDataAppLamaController;

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


Route::post('form-langsung/', [baPemeriksaanController::class, 'store']);
Route::post('form-langsung/data-lama', [baPemeriksaanController::class, 'store']);
Route::post('form-langsung/data-baru', [baPemeriksaanController::class, 'store']);
