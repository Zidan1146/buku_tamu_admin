<?php

use App\Http\Controllers\CreateAdmin as ShowCreateAdmin;

use App\Http\Controllers\API\CreateAdmin;
use App\Http\Controllers\API\LoginAction;
use App\Http\Controllers\API\RootAuthCheck;
use Illuminate\Support\Facades\Route;

Route::get('/', RootAuthCheck::class);

Route::get('/login', function () {
    return view('login.login');
});

Route::get('/create-admin', ShowCreateAdmin::class);

Route::group(['middleware' => 'auth:admin'], function () {
    // Buat route admin disini
    // Route yang ditambahkan disini dijaga oleh middleware auth:admin
    // Cek config.auth dan config.sanctum untuk lebih detail

    Route::get('/admin', function () {});
});

Route::post('/api/create-admin', CreateAdmin::class);
Route::post('/api/login', LoginAction::class);
