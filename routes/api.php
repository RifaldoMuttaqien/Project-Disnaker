<?php

use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use App\Http\Controllers\PengaduController;
use App\Http\Controllers\TiketPengaduanController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
 

Route::get('/pengadu', [APIController::class, 'pengaduAPI']);
Route::get('/tiket', [APIController::class, 'tiketAPI']);
