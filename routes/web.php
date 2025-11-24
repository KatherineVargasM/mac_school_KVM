<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsignaturasController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/asignaturas', [AsignaturasController::class, 'index']);
Route::get('/asignaturas/crear', [AsignaturasController::class, 'create'])->name('asignaturas.create');
Route::post('/asignaturas', [AsignaturasController::class, 'store'])->name('asignaturas.store');
Route::get('/asignaturas/{asignatura}/edit', [AsignaturasController::class, 'edit'])->name('asignaturas.edit');
Route::put('/asignaturas/{asignatura}', [AsignaturasController::class, 'update'])->name('asignaturas.update');
Route::delete('/asignaturas/{asignatura}', [AsignaturasController::class, 'destroy'])->name('asignaturas.destroy');