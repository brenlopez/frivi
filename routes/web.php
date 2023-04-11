<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');
Route::post('/iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'iniciarSesion'])->name('auth.iniciar.sesion');
Route::post('/cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'cerrarSesion'])->name('auth.cerrar.sesion');

Route::middleware(['auth'])->controller(\App\Http\Controllers\HomeController::class)->group(function(){
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'EsAdmin'])->controller(\App\Http\Controllers\AdminController::class)->group(function(){
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
});
