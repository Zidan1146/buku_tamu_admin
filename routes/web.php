<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateAdmin as ShowCreateAdmin;

use App\Http\Controllers\API\CreateAdmin;
use App\Http\Controllers\API\LoginAction;
use App\Http\Controllers\API\RootAuthCheck;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\API\LogoutAction;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TamuController;

Route::get('/', RootAuthCheck::class);

Route::get('/login', LoginController::class)->name('login');

Route::get('/create-admin', ShowCreateAdmin::class);

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/daftar-tamu', [TamuController::class, 'tamu_tampil'])->name('tamu.tampil');
    Route::get('/admin/daftar-tamu/{tanggal}', [TamuController::class, 'tamu_tampil'])->name('tamu.tampil.data');
    Route::get('/admin/laporan-tamu', [TamuController::class, 'laporan_tampil'])->name('laporan.tampil');

    Route::post('admin/api/logout', LogoutAction::class)->name('logout.action');
});

Route::post('/api/create-admin', CreateAdmin::class)->name('admin.create');
Route::post('/api/login', LoginAction::class)->name('login.action');
