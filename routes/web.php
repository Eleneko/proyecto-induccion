<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('mascotas', App\Http\Controllers\MascotaController::class);
Route::resource('clientes', App\Http\Controllers\ClienteController::class);
Route::resource('adopciones', App\Http\Controllers\AdopcioneController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
