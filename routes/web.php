<?php

use App\Http\Controllers\dataPengaduanController;
use App\Http\Controllers\PengaduController;
use App\Http\Controllers\PengaduTampilController;
use App\Http\Controllers\ProgressPengaduanController;
use App\Http\Controllers\TiketPengaduanTampilController;
use App\Models\TiketPengaduanTampil;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes(['verify' => true]);

Route::resource('/datapengaduan', dataPengaduanController::class);
// Route::get('/progress-pengaduan', [App\Http\Controllers\dataPengaduanController::class, 'progressPengaduan'])->name('datapengaduan.progresspengaduan');

Route::get('/progress-pengaduan', [ProgressPengaduanController::class, 'index'])->name('progressPengaduan.index');
Route::get('/progress-pengaduan/{id}/progress', [ProgressPengaduanController::class, 'progress'])->name('datapengaduan.progress');

// Route Dashboard yang terhubung API APIP
Route::resource('pengadutampil', PengaduTampilController::class);
Route::get('/dashboard', [PengaduTampilController::class, 'index'])->name('dashboard.index');
Route::get('/create', [PengaduTampilController::class, 'create'])->name('dashboard.create');


Route::resource('tiketpengaduantampil', TiketPengaduanTampilController::class);
route::get('/tiket', [TiketPengaduanTampilController::class, 'index'])->name('dashboard.tiket.index');
 route::get('/tiket-tambah', [TiketPengaduanTampilController::class, 'create'])->name('dashboard.tiket');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('profile', function () {
    // hanya user yang verified yang bisa mengakses route ini
})->middleware('verified');
