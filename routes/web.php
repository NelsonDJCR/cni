<?php

use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\TipoDocumentoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CabildosController;
use App\Http\Controllers\ReportController;

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

Route::get('/', [CabildosController::class,'getIndex']);

Route::get('/new-sesion', [CabildosController::class,'getIndex']);
Route::post('/saveSesion', [CabildosController::class,'save']);
Route::get('/edit-sesion/{id}', [CabildosController::class,'edit']);
Route::post('/edit-sesion-document', [CabildosController::class,'editDocument']);
Route::post('/editSesion', [CabildosController::class,'editSesion']);
Route::post('/delete-session', [CabildosController::class,'deleteSesion']);
Route::post('/view-documents', [CabildosController::class,'viewDocuments']);
Route::get('/uploads/{file}',[CabildosController::class,'downloadFile']);
Route::get('/report-cabildos', [CabildosController::class,'reportSessions']);
Route::post('/report-cabildos', [CabildosController::class,'reportSessions']);
Route::post('/report-cabildos_a', [CabildosController::class,'reportSessions_filtrado'])->name('report_cabildos');
Route::get('/list-cabildos',[CabildosController::class,'list']);



//--------------------------------------------------------------------------------------
// Rutas para reportes
//--------------------------------------------------------------------------------------

Route::get('/excel-cabildos', [ReportController::class,'excelCabildos']);
Route::post('/excel-cabildos', [ReportController::class,'excelCabildos']);




//--------------------------------------------------------------------------------------
// Rutas para municipios
//--------------------------------------------------------------------------------------

Route::get('/municipios',[MunicipioController::class, 'index']);
Route::post('modal_eliminar_municipio',[MunicipioController::class,'modal_eliminar_municipio'])->name('modal_eliminar_municipio');
Route::post('eliminar_municipio',[MunicipioController::class,'destroy'])->name('municipio.destroy');
Route::post('/modal_crear_municipio',[MunicipioController::class,'modal_crear_municipio'])->name('modal_crear_municipio');
Route::post('/crear_municipio',[MunicipioController::class,'store'])->name('municip??o.store');
Route::post('/editar_municipio',[MunicipioController::class, 'edit'])->name('municipio.edit');
Route::post('/update_municipio',[MunicipioController::class, 'update'])->name('municipio.update');
Route::post('buscar-municipio',[MunicipioController::class,'buscar_municipio'])->name('buscar_municipio');


Route::post('/dep_municipio',[MunicipioController::class,'depMunicipio']);


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
Route::post('buscar-departamento',[DepartamentoController::class,'buscar_departamento'])->name('buscar_departamento');


//--------------------------------------------------------------------------------------
// Rutas para tipos de documento
//--------------------------------------------------------------------------------------

Route::get('/tipos-de-archivo',[TipoDocumentoController::class, 'index']);
Route::post('modal_eliminar_tipoDocumento',[TipoDocumentoController::class,'modal_eliminar_tipoDocumento'])->name('modal_eliminar_tipoDocumento');
Route::post('eliminar_tipoDocumento',[TipoDocumentoController::class,'destroy'])->name('tipoDocumento.destroy');
Route::post('/modal_creartipoDocumento',[TipoDocumentoController::class,'modal_crear_municipio'])->name('modal_crear_tipoDocumento');
Route::post('/crear_tipoDocumento',[TipoDocumentoController::class,'store'])->name('tipoDocumento.store');
Route::post('/editar_tipoDocumento',[TipoDocumentoController::class, 'edit'])->name('tipoDocumento.edit');
Route::post('/update_tipoDocumento',[TipoDocumentoController::class, 'update'])->name('tipoDocumento.update');
Route::post('buscar-tipoDocumento',[TipoDocumentoController::class,'buscar_tipoDocumento'])->name('buscar_tipoDocumento');
