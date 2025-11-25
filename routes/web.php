<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsignaturasController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\CiclosController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/asignaturas', [AsignaturasController::class, 'index']);
Route::get('/asignaturas/crear', [AsignaturasController::class, 'create'])->name('asignaturas.create');
Route::post('/asignaturas', [AsignaturasController::class, 'store'])->name('asignaturas.store');
Route::get('/asignaturas/{asignatura}/edit', [AsignaturasController::class, 'edit'])->name('asignaturas.edit');
Route::put('/asignaturas/{asignatura}', [AsignaturasController::class, 'update'])->name('asignaturas.update');
Route::delete('/asignaturas/{asignatura}', [AsignaturasController::class, 'destroy'])->name('asignaturas.destroy');

Route::get('/cursos', [CursosController::class, 'index'])->name('cursos.index');
Route::get('/cursos/crear', [CursosController::class, 'create'])->name('cursos.create');
Route::post('/cursos', [CursosController::class, 'store'])->name('cursos.store');
Route::get('/cursos/{curso}/edit', [CursosController::class, 'edit'])->name('cursos.edit');
Route::put('/cursos/{curso}', [CursosController::class, 'update'])->name('cursos.update');
Route::delete('/cursos/{curso}', [CursosController::class, 'destroy'])->name('cursos.destroy');

Route::get('/ciclos', [CiclosController::class, 'index'])->name('ciclos.index');
Route::get('/ciclos/crear', [CiclosController::class, 'create'])->name('ciclos.create'); 
Route::post('/ciclos', [CiclosController::class, 'store'])->name('ciclos.store');
Route::get('/ciclos/{ciclo}/edit', [CiclosController::class, 'edit'])->name('ciclos.edit');
Route::put('/ciclos/{ciclo}', [CiclosController::class, 'update'])->name('ciclos.update');
Route::delete('/ciclos/{ciclo}', [CiclosController::class, 'destroy'])->name('ciclos.destroy');
