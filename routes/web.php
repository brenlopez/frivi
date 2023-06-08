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
    Route::get('/home/{busqueda?}', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/crear-peticion', [\App\Http\Controllers\PeticionesController::class, 'crearPeticion'])->name('form.crear.peticion');
    Route::post('/guardar-peticion', [\App\Http\Controllers\PeticionesController::class, 'guardarPeticion'])->name('crear.peticion');
    Route::post('/aceptar-voluntario', [\App\Http\Controllers\PeticionesController::class, 'aceptarVoluntario'])->name('aceptar.voluntario');
    Route::get('/seguimiento/{id}', [\App\Http\Controllers\PeticionesController::class, 'seguirPeticion'])->name('seguir.peticion');
    Route::post('/cargar-imagen', [\App\Http\Controllers\PeticionesController::class, 'cargarImagen'])->name('form.cargar.imagen');

    Route::get('/notificaciones', [\App\Http\Controllers\NotificacionesController::class, 'index'])->name('notificaciones');
    Route::post('/enviar-oferta', [\App\Http\Controllers\NotificacionesController::class, 'enviarOferta'])->name('enviar.oferta');
});

Route::middleware(['auth', 'EsAdmin'])->controller(\App\Http\Controllers\AdminController::class)->group(function(){
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
});
