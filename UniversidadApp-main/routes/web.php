<?php

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::resource('user','App\Http\Controllers\UserController');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard','App\Http\Controllers\DashboardController@index' )->name('dashboard');
    Route::resource('alumno','App\Http\Controllers\AlumnoController');
    Route::get('alumno/getSecciones/{carreraId}', 'App\Http\Controllers\AlumnoController@getSeccionesByCarrera');
    Route::resource('carrera','App\Http\Controllers\CarreraController');
    Route::resource('evaluacion','App\Http\Controllers\EvaluacionesController');
    Route::resource('horario','App\Http\Controllers\HorarioController');
    Route::resource('profesor','App\Http\Controllers\MaestroController');
    Route::get('profesor/getSecciones/{carreraId}', 'App\Http\Controllers\MaestroController@getSeccionesByCarrera');
    Route::resource('materia','App\Http\Controllers\MateriaController');
    Route::resource('record_academico','App\Http\Controllers\RecorAcademicoController');
    Route::resource('roles','App\Http\Controllers\RolesController');
    Route::resource('seccion','App\Http\Controllers\SeccionController');
    Route::resource('sedes','App\Http\Controllers\SedesController');
    Route::resource('calificaciones','App\Http\Controllers\CalificacionesController');
    Route::post('/user/{id}/cambiarEstado', 'App\Http\Controllers\UserController@cambiarEstado')->name('user.cambiarEstado');

});
