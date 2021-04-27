<?php

use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\TipoArchivoController;
use App\Http\Controllers\TipoDocumentoController;
use App\Models\Departamento;
use App\Models\TipoArchivo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CabildosController;

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


Route::get('/new-sesion', [CabildosController::class,'getIndex']);
Route::post('/saveSesion', [CabildosController::class,'save']);

Route::get('/edit-sesion', function () {
    return view('sessions.edit-sesion');
});

Route::get('/report-cabildos', function () {
    return view('sessions.report');
});
Route::get('/list-cabildos', function () {
    return view('sessions.list');
});


//--------------------------------------------------------------------------------------
// Rutas para municipios
//--------------------------------------------------------------------------------------

Route::get('/municipios',[MunicipioController::class, 'index']);
Route::post('modal_eliminar_municipio',[MunicipioController::class,'modal_eliminar_municipio'])->name('modal_eliminar_municipio');
Route::post('eliminar_municipio',[MunicipioController::class,'destroy'])->name('municipio.destroy');
Route::post('/modal_crear_municipio',[MunicipioController::class,'modal_crear_municipio'])->name('modal_crear_municipio');
Route::post('/crear_municipio',[MunicipioController::class,'store'])->name('municipío.store');
Route::post('/editar_municipio',[MunicipioController::class, 'edit'])->name('municipio.edit');
Route::post('/update_municipio',[MunicipioController::class, 'update'])->name('municipio.update');


//--------------------------------------------------------------------------------------
// Rutas para departamentos
//--------------------------------------------------------------------------------------

Route::get('/departamentos',[DepartamentoController::class, 'index']);
Route::post('modal_eliminar_departamento',[DepartamentoController::class,'modal_eliminar_departamento'])->name('modal_eliminar_departamento');
Route::post('eliminar_departamento',[DepartamentoController::class,'destroy'])->name('departamento.destroy');
Route::post('/modal_creardepartamento',[DepartamentoController::class,'modal_crear_municipio'])->name('modal_crear_departamento');
Route::post('/crear_departamento',[DepartamentoController::class,'store'])->name('departamento.store');
Route::post('/editar_departamento',[DepartamentoController::class, 'edit'])->name('departamento.edit');
Route::post('/update_departamento',[DepartamentoController::class, 'update'])->name('departamento.update');


//--------------------------------------------------------------------------------------
// Rutas para tipos de documento
//--------------------------------------------------------------------------------------

Route::get('/tipos-de-documento',[TipoDocumentoController::class, 'index']);
Route::post('modal_eliminar_departamento',[TipoDocumentoController::class,'modal_eliminar_departamento'])->name('modal_eliminar_departamento');
Route::post('eliminar_departamento',[TipoDocumentoController::class,'destroy'])->name('departamento.destroy');
Route::post('/modal_creardepartamento',[TipoDocumentoController::class,'modal_crear_municipio'])->name('modal_crear_departamento');
Route::post('/crear_departamento',[TipoDocumentoController::class,'store'])->name('departamento.store');
Route::post('/editar_departamento',[TipoDocumentoController::class, 'edit'])->name('departamento.edit');
Route::post('/update_departamento',[TipoDocumentoController::class, 'update'])->name('departamento.update');
