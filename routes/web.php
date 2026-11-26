<?php

use App\Http\Controllers\RentalProductController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/nuestra-forma-de-aprender', 'learning')->name('learning');
Route::view('/contacto', 'contact')->name('contact');
Route::view('/terminos-y-condiciones', 'terms')->name('terms');
Route::view('/login', 'auth')->name('login');
Route::view('/register', 'auth')->name('register');
Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('/dashboard/inventario', 'dashboard.inventory')->name('dashboard.inventory');
Route::view('/dashboard/prestamos', 'dashboard.loans')->name('dashboard.loans');
Route::view('/dashboard/solicitudes', 'dashboard.requests')->name('dashboard.requests');
Route::view('/dashboard/actividad', 'dashboard.activity')->name('dashboard.activity');
Route::get('/rentas', [RentalProductController::class, 'index'])->name('rentals.index');
Route::get('/rentas/{product}', [RentalProductController::class, 'show'])->name('rentals.show');
Route::post('/rentas/{product}/reserva', [RentalProductController::class, 'reserve'])->name('rentals.reserve');

Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
