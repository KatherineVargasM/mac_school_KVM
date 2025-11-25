<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsignaturasController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\CiclosController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\AlumnosController; 


Route::get('/', function () {

    return view('dashboard');
});


Route::get('/asignaturas', [AsignaturasController::class, 'index'])->name('asignaturas.index');
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

Route::get('/personal', [PersonalController::class, 'index'])->name('personal.index');
Route::get('/personal/crear', [PersonalController::class, 'create'])->name('personal.create');
Route::post('/personal', [PersonalController::class, 'store'])->name('personal.store');
Route::get('/personal/{pers}/edit', [PersonalController::class, 'edit'])->name('personal.edit');
Route::put('/personal/{pers}', [PersonalController::class, 'update'])->name('personal.update');
Route::delete('/personal/{pers}', [PersonalController::class, 'destroy'])->name('personal.destroy');

Route::get('/alumnos', [AlumnosController::class, 'index'])->name('alumnos.index');
Route::get('/alumnos/crear', [AlumnosController::class, 'create'])->name('alumnos.create');
Route::post('/alumnos', [AlumnosController::class, 'store'])->name('alumnos.store');
Route::get('/alumnos/{alumno}/edit', [AlumnosController::class, 'edit'])->name('alumnos.edit');
Route::put('/alumnos/{alumno}', [AlumnosController::class, 'update'])->name('alumnos.update');
Route::delete('/alumnos/{alumno}', [AlumnosController::class, 'destroy'])->name('alumnos.destroy');