<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\KategoriController;
use Illuminate\Http\Request;
use App\Http\Controllers\PengaduController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\TiketPengaduanController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');






Route::post('/tambah_tiket', [APIController::class, 'pengaduanBaru']);
Route::post('/update_tanggapan/{id}', [APIController::class, 'ubahTanggapan']);
Route::post('/cari_tiket', [APIController::class, 'cariTiket']);
Route::post('/cari_user', [APIController::class, 'cariPengadu']);
Route::get('/semua_data', [APIController::class,'tampilData']);
Route::get('/ambil_data/{id}', [APIController::class,'ambilTanggapan']);


Route::get('/pengadu', [PengaduController::class, 'index']);
Route::get('/show_pengadu/{id}', [PengaduController::class, 'show']);
Route::post('/create_pengadu', [PengaduController::class, 'store']);
Route::post('/update_pengadu/{id}', [PengaduController::class, 'update']);
Route::delete('/delete_pengadu/{id}', [PengaduController::class,'destroy']);


Route::get('/tiket', [TiketPengaduanController::class, 'index']);
Route::get('/show_tiket/{id}', [TiketPengaduanController::class, 'show']);
Route::post('/create_tiket', [TiketPengaduanController::class,'store']);
Route::delete('/delete_tiket/{id}', [TiketPengaduanController::class, 'destroy']);


Route::get('/tanggapan', [TanggapanController::class, 'index']);
Route::get('/show_tanggapan/{id}', [TanggapanController::class, 'show']);
Route::post('/create_tanggapan', [TanggapanController::class,'store']);


Route::get('/kategori', [KategoriController::class, 'index']);
