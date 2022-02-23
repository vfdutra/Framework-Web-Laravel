<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\PacientesController;

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
    return view('welcome');
});

Route::resource('medicos', MedicosController::class);

Route::resource('pacientes', PacientesController::class);

Route::resource('consulta', ConsultaController::class);

Route::get('/relatorios/listamedicosconsultas', 'App\Http\Controllers\MedicosController@listaMedicosConsultas');

Route::get('/relatorios/listapacientesconsultas', 'App\Http\Controllers\PacientesController@listaPacientesConsultas');

Auth::routes();

//Auth::logout();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('pacientes', PacientesController::class)->middleware('auth');

Route::resource('medicos', MedicosController::class)->middleware('auth');

Route::resource('consulta', ConsultaController::class)->middleware('auth');