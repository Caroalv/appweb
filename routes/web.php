<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\NotaController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumnos.index');
Route::post('/alumnos', [AlumnoController::class, 'store'])->name('alumnos.store');

Route::get('/profesores', [ProfesorController::class, 'index'])->name('profesores.index');
Route::post('/profesores', [ProfesorController::class, 'store'])->name('profesores.store');

Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');

Route::get('/notas', [NotaController::class, 'index'])->name('notas.index');
Route::post('/notas', [NotaController::class, 'store'])->name('notas.store');

Route::post('/cursos/buscar-profesores', [CursoController::class, 'buscarProfesores'])->name('cursos.buscar_profesores');

Route::post('/notas/buscar-alumnos', [NotaController::class, 'buscarAlumnos'])->name('notas.buscar_alumnos');
Route::post('/notas/buscar-cursos', [NotaController::class, 'buscarCursos'])->name('notas.buscar_cursos');
Route::post('/notas/buscar-profesores', [NotaController::class, 'buscarProfesores'])->name('notas.buscar_profesores');