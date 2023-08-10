<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PreInscripcionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('facultad/{facultad}/escuelas', [PreInscripcionController::class, 'listaescuelas']);
Route::get('departamento/{departamento}/provincias', [PreInscripcionController::class, 'listaprovincia']);
Route::get('provincia/{provincia}/distritos', [PreInscripcionController::class, 'listadistrito']);
Route::get('alumnos_facultad', [PreInscripcionController::class, 'alumnosporfacultad']);
