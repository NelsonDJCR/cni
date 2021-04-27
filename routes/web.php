<?php

use App\Http\Controllers\MunicipioController;
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
// Rutas para parametrización
//--------------------------------------------------------------------------------------

Route::get('/municipios',[MunicipioController::class, 'index']);
Route::post('modal_eliminar_municipio',[MunicipioController::class,'modal_eliminar_municipio'])->name('modal_eliminar_municipio');
Route::post('eliminar_municipio',[MunicipioController::class,'destroy'])->name('municipio.destroy');
