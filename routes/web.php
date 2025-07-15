<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiembroController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\ColorController;

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

Route::get('/', function () {return view('layouts.principal');})->name('inicio');
Route::get('/login', [SessionsController::class, 'index'])->middleware('guest')->name('login.index');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');
Route::get('/logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('login.destroy');
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth','auth.admin')->name('admin.index');
Route::put('/admin/{id}', [AdminController::class, 'update'])->middleware('auth', 'auth.admin')->name('admin.update');

Route::get('nosotros', function () {return view('layouts.nosotros');})->name('nosotros');
//Route::get('mensaje', function () {return view('layouts.contact-form');})->name('mensaje');

Route::get('miembros', [MiembroController::class, 'index'])->name('miembros.index');
Route::get('miembros/create', [MiembroController::class, 'create'])->middleware('auth', 'auth.admin')->name('miembros.create');
Route::post('miembros/create', [MiembroController::class, 'store'])->name('miembros.store');
Route::get('miembros/{id}', [MiembroController::class, 'show'])->name('miembros.show');
Route::get('miembros/{miembro}/edit', [MiembroController::class, 'edit'])->middleware('auth', 'auth.perfil')->name('miembros.edit');
Route::put('miembros/{miembro}/{ultimoCargo}', [MiembroController::class, 'update'])->name('miembros.update');

Route::get('actividades', [ProyectoController::class, 'index'])->name('actividades.index');
Route::get('actividades/{tipo}/create', [ProyectoController::class, 'create'])->middleware('auth', 'auth.editor')->name('actividades.create');
Route::get('actividades/{proyecto}/edit', [ProyectoController::class, 'edit'])->middleware('auth', 'auth.editor')->name('actividades.edit');
Route::post('actividades/create', [ProyectoController::class, 'store'])->name('actividades.store');
Route::get('actividades/{tipo}/{id}', [ProyectoController::class, 'show'])->name('actividades.show');
Route::put('actividades/{proyecto}', [ProyectoController::class, 'update'])->name('actividades.update');

Route::get('cargo/create', [CargoController::class, 'create'])->middleware('auth', 'auth.admin')->name('cargo.create');
Route::post('cargo/create', [CargoController::class, 'store'])->name('cargo.store');

Route::get('gestion/create', [GestionController::class, 'create'])->middleware('auth', 'auth.admin')->name('gestion.create');
Route::post('gestion/create', [GestionController::class, 'store'])->name('gestion.store');

Route::get('color/update', [ColorController::class, 'edit'])->middleware('auth', 'auth.admin')->name('color.edit');
Route::put('color/update', [ColorController::class, 'update'])->name('color.update');

Route::get('postulacion', [ContactFormController::class, 'form'])->name('postulacion');
Route::post('postulacion', [ContactFormController::class, 'send'])->name('postulacion.send');

