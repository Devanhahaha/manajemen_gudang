<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PegawaiController;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login.login');
})->name('login');

Route::get('/register', function () {
    return view('login.register');
})->name('register');

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/penerimaan-barang', function () {
    return view('barang.inbound');
})->name('penerimaan-barang');

Route::get('/pengeluaran-barang', function () {
    return view('barang.outbound');
})->name('pengeluaran-barang');

Route::get('/laporan-barang-keluar', function () {
    return view('laporan.barang_keluar');
})->name('laporan-barang-keluar');

//login
Route::post('/login/process', [LoginController::class, 'loginProcess'])->name('login.process');
Route::get('/logout/process', [LoginController::class, 'logout'])->name('logout.process');
Route::post('/register/process', [LoginController::class, 'store'])->name('register.process');

// barang
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');
Route::get('/barang/add', [BarangController::class, 'create'])->name('barang.create');
Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
Route::get('/barang/detail/{id}', [BarangController::class, 'show'])->name('barang.detail');
Route::put('/barang/update/{id}', [BarangController::class, 'edit'])->name('barang.update');
Route::delete('/barang/delete/{id}', [BarangController::class, 'destroy'])->name('barang.delete');

// pegawai
Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/add', [PegawaiController::class, 'create'])->name('pegawai.create');
Route::get('/pegawai/detail/{id}', [PegawaiController::class, 'show'])->name('pegawai.detail');
Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::put('/pegawai/update/{id}', [PegawaiController::class, 'edit'])->name('pegawai.update');
Route::delete('/pegawai/delete/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.delete');