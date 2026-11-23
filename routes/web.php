<?php

use App\Http\Controllers\RentalProductController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/login', 'auth')->name('login');
Route::view('/register', 'auth')->name('register');
Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::get('/rentas', [RentalProductController::class, 'index'])->name('rentals.index');
Route::get('/rentas/{product}', [RentalProductController::class, 'show'])->name('rentals.show');
Route::post('/rentas/{product}/reserva', [RentalProductController::class, 'reserve'])->name('rentals.reserve');

Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
