<?php

use Illuminate\Http\Request;
use App\Http\Controllers\PengaduController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
 

Route::get('/pengadu', [PengaduController::class, 'index']);
