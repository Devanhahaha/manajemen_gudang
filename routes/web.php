<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\Pegawai\BarangPegawaiController;
use App\Http\Controllers\Pegawai\BarangKeluarPegawaiController;
use App\Http\Controllers\Pegawai\DashboardPegawaiController;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login.login');
})->name('login');

Route::get('/register', function () {
    return view('login.register');
})->name('register');

//login
Route::post('/login/process', [LoginController::class, 'loginProcess'])->name('login.process');
Route::get('/logout/process', [LoginController::class, 'logout'])->name('logout.process');
Route::post('/register/process', [LoginController::class, 'store'])->name('register.process');

    Route::prefix('admin')->middleware('role:admin')->group(function () {
        // dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // pegawai
        Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
        Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
        Route::get('/pegawai/add', [PegawaiController::class, 'create'])->name('pegawai.create');
        Route::get('/pegawai/detail/{id}', [PegawaiController::class, 'show'])->name('pegawai.detail');
        Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
        Route::put('/pegawai/update/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
        Route::delete('/pegawai/delete/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.delete');

        // barang
        Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
        Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');
        Route::get('/barang/add', [BarangController::class, 'create'])->name('barang.create');
        Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
        Route::get('/barang/detail/{id}', [BarangController::class, 'show'])->name('barang.detail');
        Route::put('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
        Route::delete('/barang/delete/{id}', [BarangController::class, 'destroy'])->name('barang.delete');

        //barangkeluar
        Route::get('/barang-keluar', [BarangKeluarController::class, 'index'])->name('barang-keluar.index');
        Route::post('/barang-keluar/store', [BarangKeluarController::class, 'store'])->name('barang-keluar.store');
        Route::get('/barang-keluar/add', [BarangKeluarController::class, 'create'])->name('barang-keluar.create');
        Route::delete('/barang-keluar/delete/{id}', [BarangKeluarController::class, 'destroy'])->name('barang-keluar.delete');
        Route::get('/barang-keluar/detail/{id}', [BarangKeluarController::class, 'show'])->name('barang-keluar.detail');
    });

    Route::prefix('pegawai')->middleware('role:pegawai')->group(function () {
        // dashboard
        Route::get('/dashboard', [DashboardPegawaiController::class, 'index'])->name('dashboardpegawai');
        // barang
        Route::get('/barang', [BarangPegawaiController::class, 'index'])->name('barangPegawai.index');
        Route::post('/barang/store', [BarangPegawaiController::class, 'store'])->name('barangPegawai.store');
        Route::get('/barang/add', [BarangPegawaiController::class, 'create'])->name('barangPegawai.create');
        Route::get('/barang/edit/{id}', [BarangPegawaiController::class, 'edit'])->name('barangPegawai.edit');
        Route::get('/barang/detail/{id}', [BarangPegawaiController::class, 'show'])->name('barangPegawai.detail');
        Route::put('/barang/update/{id}', [BarangPegawaiController::class, 'update'])->name('barangPegawai.update');
        Route::delete('/barang/delete/{id}', [BarangPegawaiController::class, 'destroy'])->name('barangPegawai.delete');

        //barangkeluar
        Route::get('/barang-keluar', [BarangKeluarPegawaiController::class, 'index'])->name('barang-keluarPegawai.index');
        Route::post('/barang-keluar/store', [BarangKeluarPegawaiController::class, 'store'])->name('barang-keluarPegawai.store');
        Route::get('/barang-keluar/add', [BarangKeluarPegawaiController::class, 'create'])->name('barang-keluarPegawai.create');
        Route::delete('/barang-keluar/delete/{id}', [BarangKeluarPegawaiController::class, 'destroy'])->name('barang-keluarPegawai.delete');
        Route::get('/barang-keluar/detail/{id}', [BarangKeluarPegawaiController::class, 'show'])->name('barang-keluarPegawai.detail');
    });