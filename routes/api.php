<?php

use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EquipoDetalleController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\PrestamoDetalleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UsuarioRolController;
use Illuminate\Support\Facades\Route;

Route::apiResource('roles', RoleController::class);
Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('marcas', MarcaController::class);
Route::apiResource('modelos', ModeloController::class);
Route::apiResource('equipos', EquipoController::class);
Route::apiResource('equipo-detalles', EquipoDetalleController::class);
Route::apiResource('prestamos', PrestamoController::class);

Route::get('prestamo-detalles', [PrestamoDetalleController::class, 'index'])->name('prestamo-detalles.index');
Route::post('prestamo-detalles', [PrestamoDetalleController::class, 'store'])->name('prestamo-detalles.store');
Route::get('prestamo-detalles/{prestamo}/{equipo_detalle}', [PrestamoDetalleController::class, 'show'])->name('prestamo-detalles.show');
Route::delete('prestamo-detalles/{prestamo}/{equipo_detalle}', [PrestamoDetalleController::class, 'destroy'])->name('prestamo-detalles.destroy');

Route::get('usuario-roles', [UsuarioRolController::class, 'index'])->name('usuario-roles.index');
Route::post('usuario-roles', [UsuarioRolController::class, 'store'])->name('usuario-roles.store');
Route::delete('usuario-roles/{usuario}/{rol}', [UsuarioRolController::class, 'destroy'])->name('usuario-roles.destroy');
