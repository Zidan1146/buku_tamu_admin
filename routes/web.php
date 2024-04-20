<?php

use App\Http\Controllers\CreateAdmin as ShowCreateAdmin;

use App\Http\Controllers\API\CreateAdmin;
use App\Http\Controllers\API\LoginAction;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/create-admin', ShowCreateAdmin::class);

Route::get('/admin', function () {
    return "It works!!!";
})->middleware('auth:admin');

Route::post('/api/create-admin', CreateAdmin::class);
Route::post('/api/login', LoginAction::class);
