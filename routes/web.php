<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::view('login', 'Auth/login')->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// VISTAS PERSONALES DE EDICION DEL PERFIL *completed*
Route::get('perfil', [UserController::class, 'perfil'])->name('perfil');
Route::put('perfilfoto', [UserController::class, 'perfilfoto'])->name('perfilfoto');
Route::put('perfilpass', [UserController::class, 'perfilpass'])->name('perfilpass');
Route::put('perfilact/{user}', [UserController::class, 'perfilact'])->name('perfilact');

// VISTAS ADMIN
Route::get('tutores', [AdminController::class, 'tutores'])->name('tutores');
Route::get('estudiantes', [AdminController::class, 'estudiantes'])->name('estudiantes');

// VISTAS TUTOR

// VISTAR ESTUDIANTE
Route::get('fichapersonal', [EstController::class, 'fichapersonal'])->name('fichapersonal');
Route::put('fichact', [EstController::class, 'fichact'])->name('fichact');
