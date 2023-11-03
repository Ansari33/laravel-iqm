<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiswaController;

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
Route::get('/data', function () {
    return [
        'status' => true,
        'code' => 200,
        'data' => 'ini adalah data'
    ];
});
Route::prefix('siswa')->group(function () {
    Route::get('/list', [SiswaController::class,'list']);
    Route::get('/tambah', [SiswaController::class,'tambah']);
    Route::post('/simpan', [SiswaController::class,'simpan']);
    Route::get('/edit/{i}', [SiswaController::class,'edit']);
    Route::post('/update', [SiswaController::class,'update']);
    Route::get('/hapus/{i}', [SiswaController::class,'hapus']);
});
