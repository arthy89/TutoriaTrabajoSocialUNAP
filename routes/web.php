<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Tutor\SeguimientosView;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::get('storage-link', function () {
    Artisan::call('storage:link');
});

Route::view('login', 'Auth/login')->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// VISTAS PERSONALES DE EDICION DEL PERFIL *completed*
Route::get('perfil', [UserController::class, 'perfil'])->name('perfil');
Route::put('perfilfoto', [UserController::class, 'perfilfoto'])->name('perfilfoto');
Route::put('perfilpass', [UserController::class, 'perfilpass'])->name('perfilpass');
Route::put('perfilact/{user}', [UserController::class, 'perfilact'])->name('perfilact');

// VISTAS ADMIN
Route::group(['middleware' => ['auth', 'checkRole:1']], function () {
    Route::get('tutor/{dni}', [AdminController::class, 'tutor'])->name('tutor');
    Route::post('tutor/addest', [AdminController::class, 'tutoraddest'])->name('tutoraddest');
    Route::get('tutores', [AdminController::class, 'tutores'])->name('tutores');
    Route::get('estudiantes', [AdminController::class, 'estudiantes'])->name('estudiantes');
});



// VISTAS TUTOR
Route::group(['middleware' => ['auth', 'checkRole:1,2']], function () {
    Route::get('estudiantes_asignados', [TutorController::class, 'estudiantes_asignados'])->name('estudiantes_asignados');
    Route::get('estudiantes/seguimientos/{dni}', [TutorController::class, 'seguimientos'])->name('seguimientos');
    Route::get('estudiantes/constancia/{dni}', [TutorController::class, 'constancia'])->name('constancia');
    Route::get('estudiantes/ficha/{dni}', [TutorController::class, 'fichaest'])->name('fichaest');
});

// VISTAR ESTUDIANTE
Route::group(['middleware' => ['auth', 'checkRole:3']], function () {
    Route::get('fichapersonal', [EstController::class, 'fichapersonal'])->name('fichapersonal');
    Route::put('fichact', [EstController::class, 'fichact'])->name('fichact');
    Route::get('tutor_asignado', [EstController::class, 'tutorasignado'])->name('tutorasignado');
});
