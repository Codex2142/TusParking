<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\eksternalController;
use App\Http\Controllers\kendaraanController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ParkiranController;
use App\Http\Controllers\petugasController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\riwayatController;
use Illuminate\Support\Facades\Route;

// ADMIN --------------------------------------------------------------------------

// READ
Route::get('/admin-dashboard', [petugasController::class, 'read'])->middleware('admin');

// CREATE
Route::get('/admin-add', [petugasController::class, 'loadcreate'])->middleware('admin');
Route::post('admin-add', [petugasController::class, 'savecreate1'])->name('savecreate1')->middleware('admin');

// DELETE
Route::get('/admin-delete/{nip}', [petugasController::class, 'delete'])->middleware('admin');

// UPDATE
Route::get('admin-edit/{nip}', [petugasController::class, 'loadedit'])->middleware('admin');
Route::post('admin-edit/', [petugasController::class, 'saveedit1'])->name('saveedit1')->middleware('admin');


// KENDARAAN ---------------------------------------------------------------------------

// READ
Route::get('daftar-kendaraan', [kendaraanController::class, 'read'])->middleware('auth');

// DELETE
Route::get('daftar-kendaraan/{plat}', [kendaraanController::class, 'delete'])->middleware('auth');

// CREATE
Route::get('/tambah-kendaraan', [kendaraanController::class, 'loadcreate'])->middleware('auth');
Route::post('tambah-kendaraan', [kendaraanController::class, 'savecreate'])->name('savecreate')->middleware('auth');

// UPDATE
Route::get('edit-kendaraan/{nim}', [kendaraanController::class, 'loadedit'])->middleware('auth');
Route::post('edit-kendaraan', [kendaraanController::class, 'saveedit'])->name('saveedit')->middleware('auth');


// MASUK -------------------------------------------------------------------------------

// READ (Form Masuk Kendaraan)
Route::get('/masuk', function () {
    return view('masuk.masuk');
})->middleware('auth');

// CREATE (Verifikasi Kendaraan Masuk)
Route::post('/masuk', [ParkiranController::class, 'verifikasi'])->name('verifikasi')->middleware('auth');


// KELUAR -------------------------------------------------------------------------------------------

// READ (Lihat Data Kendaraan Keluar)
Route::get('/keluar', [ParkiranController::class, 'read'])->middleware('auth');

// UPDATE & DELETE (Validasi Kendaraan Keluar)
Route::get('/keluar-validasi/{id}', [ParkiranController::class, 'loadedit'])->middleware('auth');
Route::post('/keluar-validasi', [riwayatController::class, 'create'])->name('create')->middleware('auth');


// DASHBOARD ------------------------------------------------------------------------------------------

// READ (Dashboard Utama)
Route::get('/', [dashboardController::class, 'read'])->middleware('auth');


// RIWAYAT -------------------------------------------------------------------------------------------

// READ (Lihat Riwayat Kendaraan)
Route::get('riwayat', [riwayatController::class , 'read'])->middleware('auth');


// LOGIN ------------------------------------------------------------------------------------------

// Form Login
Route::get('/login', function(){
    return view('admin.admin-login');
})->name('login')->middleware('guest');

// Proses Login
Route::post('/login', [loginController::class, 'auth'])->name('auth');


// LOGOUT ========================================================================================

// Proses Logout
Route::post('/logout', [loginController::class, 'logout'])->name('logout')->middleware('auth');

// REGISTER ---------------------------------------------------------------------------------------
Route::get('/register', [registerController::class, 'register'])->middleware('guest');
Route::post('/register', [registerController::class, 'createregis'])->name('createregis')->middleware('guest');

//EKSTERNAL -------------------------------------------------------------------------------------

Route::get('/pengecualian', [eksternalController::class, 'read'])->middleware('auth');
Route::get('/tambahkan-pengunjung', [eksternalController::class, 'load'])->middleware('auth');
Route::post('/tambahkan-pengunjung', [eksternalController::class, 'createfoto'])->name('createfoto')->middleware('auth');
