<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.index');
});

// login admin
Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\AdminController::class, 'authenticate'])->name('admin.authenticate');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas/tambah', [KelasController::class, 'tambahKelas'])->name('kelas.tambah');
    Route::post('/kelas/tambah', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/kelas/edit/{id}', [KelasController::class, 'editKelas'])->name('kelas.edit');
    Route::put('/kelas//edit/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/kelas/hapus/{id}', [KelasController::class, 'destroy'])->name('kelas.hapus');
});
