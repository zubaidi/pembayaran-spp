<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.index');
});

// login admin
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/tambah', [SiswaController::class, 'tambahSiswa'])->name('siswa.tambah');
    Route::post('/siswa/tambah', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'editSiswa'])->name('siswa.edit');
    Route::put('/siswa/edit/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/hapus/{id}', [SiswaController::class, 'destroy'])->name('siswa.delete');
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas/tambah', [KelasController::class, 'tambahKelas'])->name('kelas.tambah');
    Route::post('/kelas/tambah', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/kelas/edit/{id}', [KelasController::class, 'editKelas'])->name('kelas.edit');
    Route::put('/kelas//edit/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/kelas/hapus/{id}', [KelasController::class, 'destroy'])->name('kelas.hapus');
    Route::get('/spp', [SppController::class, 'index'])->name('spp.index');
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('/pembayaran/tambah', [PembayaranController::class, 'tambahPembayaran'])->name('pembayaran.tambah');
});
