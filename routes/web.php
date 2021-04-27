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
    return view('welcome');
});
Route::get('/edit-sesion', function () {
    return view('sessions.edit-sesion');
});
Route::get('/new-sesion', function () {
    return view('sessions.new-sesion');
});
Route::get('/list-cabildos', function () {
    return view('sessions.report');
});


//--------------------------------------------------------------------------------------
// Rutas para parametrización
//--------------------------------------------------------------------------------------

Route::get('/municipios',function()
{
    return view('municipios.index');
});
