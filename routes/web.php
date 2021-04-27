<?php

use App\Http\Controllers\MunicipioController;
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
    return view('welcome');
});
Route::get('/edit-sesion', function () {
    return view('sessions.edit-sesion');
});
Route::get('/new-sesion', function () {
    return view('sessions.new-sesion');
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

Route::get('/municipios', function () {
    return view('municipios_J.index');
});

//  Route::view('/municipio', [MunicipioController::class]);

// Route::resource("municipio", [MunicipioController::class])->parameters(["municipios"=>"municipio"]);
