<?php

use App\Http\Controllers\CreateAdmin as ShowCreateAdmin;

use App\Http\Controllers\API\CreateAdmin;
use App\Http\Controllers\API\LoginAction;
use App\Http\Controllers\API\RootAuthCheck;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TamuController;

Route::get('/', RootAuthCheck::class);

Route::get('/login', [LoginAction::class, 'showLogin'])->name('login');

Route::get('/create-admin', ShowCreateAdmin::class);

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/daftar-tamu', [TamuController::class, 'tamu_tampil'])->name('tamu.tampil');
    Route::get('/laporan-tamu', [TamuController::class, 'laporan_tampil'])->name('laporan.tampil');
});

Route::post('/api/create-admin', CreateAdmin::class);
Route::post('/api/login', LoginAction::class);
