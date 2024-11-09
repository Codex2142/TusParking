<?php

use App\Http\Controllers\kendaraanController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\petugasController;
use App\Models\kendaraan;
use App\Models\petugas;
use Illuminate\Support\Facades\Route;

//ADMIN --------------------------------------------------------------------------

//READ
Route::get('/admin-dashboard', [petugasController::class, 'read']);

//CREATE
Route::get('/admin-add', [petugasController::class, 'loadcreate']);
Route::post('/admin-add', [petugasController::class, 'savecreate'])->name('savecreate');

//DELETE
Route::get('/admin-delete/{nip}', [petugasController::class, 'delete']);

//UPDATE
Route::get('admin-edit/{nip}', [petugasController::class, 'loadedit']);
Route::post('admin-edit/', [petugasController::class, 'saveedit'])->name('saveedit');


//KENDARAAN---------------------------------------------------------------------------

//READ
Route::get('daftar-kendaraan', [kendaraanController::class, 'read']);

//DELETE
Route::get('daftar-kendaraan/{plat}', [kendaraanController::class, 'delete']);


//CREATE
Route::get('/tambah-kendaraan', [kendaraanController::class, 'loadcreate']);
Route::post('tambah-kendaraan', [kendaraanController::class, 'savecreate'])->name('savecreate');


//UPDATE
Route::get('edit-kendaraan/{nim}', [kendaraanController::class, 'loadedit']);
Route::post('edit-kendaraan', [kendaraanController::class, 'saveedit'])->name('saveedit');

