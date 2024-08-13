<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\NotaController;

Route::get('/', function () {
    return redirect()->route('estudiantes.index');
});

Route::resource('estudiantes', EstudianteController::class);
Route::resource('cursos', CursoController::class);
Route::resource('materias', MateriaController::class);
Route::resource('notas', NotaController::class);
