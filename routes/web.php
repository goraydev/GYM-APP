<?php

use App\Http\Controllers\AsistenciaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TdependenciaController;
use App\Http\Controllers\DependenciaController;
use App\Http\Controllers\SubdependenciaController;
use App\Http\Controllers\ConvocatoriaController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\PconvocatoriaController;
use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\IndexController;
// use App\Http\Controllers\CategoriaController;
// use App\Http\Controllers\MarcaController;
// use App\Http\Controllers\AreaController;
// use App\Http\Controllers\EstadoController;
// use App\Http\Controllers\ToperacionController;
// use App\Http\Controllers\EquipoController;
// use App\Http\Controllers\OperacionController;
// use App\Http\Controllers\ReportController;
use App\Http\Controllers\PreInscripcionController;
use App\Http\Controllers\PersonaCriterioController;
use App\Http\Controllers\InscripcionClaseController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

//Route::get('/', function () {
//    return view('/login');
//});
// Route::get('verbase', function () {
//     return view('home');
// });

Auth::routes();

//Route::get('/panel-administrativo',[HomeController::class,'index'])->name('home');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

HomeController::HomeRoutes();
PreInscripcionController::RegisterPreinscripcionRoutes();
PersonaCriterioController::RegisterPreCriterioscionRoutes();
InscripcionClaseController::RegisterInscripcionClaseRoutes();
InscripcionController::RegisterInscripcionRoutes();
AsistenciaController::RegisterAsistenciaRoutes();
ReportController::ReportRoutes();
ExportController::ExportRoutes();
UserController::UserRoutes();
//Route::resource('facultad',FacultadController::class);

// Route::resource('/categorias', CategoriaController::class);
// Route::get('Categoria/altabaja/{estado}/{id}',[CategoriaController::class,'altabaja']);

// Route::resource('/marcas', MarcaController::class);
// Route::get('Marca/altabaja/{estado}/{id}',[MarcaController::class,'altabaja']);

// Route::resource('/areas', AreaController::class);
// Route::get('Area/altabaja/{estado}/{id}',[AreaController::class,'altabaja']);

// Route::resource('/estados', EstadoController::class);
// Route::get('Estado/altabaja/{estado}/{id}',[EstadoController::class,'altabaja']);

// Route::resource('/toperaciones', ToperacionController::class);
// Route::get('Toperacion/altabaja/{estado}/{id}',[ToperacionController::class,'altabaja']);

// Route::resource('/equipos', EquipoController::class);
// Route::get('Equipo/altabaja/{estado}/{id}',[EquipoController::class,'altabaja']);

// Route::resource('/operaciones', OperacionController::class);
// Route::resource(name:'operaciones', controller:App\Http\Controllers\OperacionController::class);
// Route::get('Operacion/altabaja/{estado}/{id}',[OperacionController::class,'altabaja']);
// Route::get('Operacion/imprimir/{id}',[OperacionController::class,'imprimir']);
// Route::get('Operacion/buscar',[OperacionController::class,'buscar'])->name('operacion.buscar');



// Route::resource('/tdependencias', TdependenciaController::class);
// Route::get('Tdependencia/altabaja/{estado}/{id}',[TdependenciaController::class,'altabaja']);

// Route::resource('/dependencias', DependenciaController::class);
// Route::get('Dependencia/altabaja/{estado}/{id}',[DependenciaController::class,'altabaja']);

// Route::resource('/subdependencias', SubdependenciaController::class);
// Route::get('Subdependencia/altabaja/{estado}/{id}',[SubdependenciaController::class,'altabaja']);


//Route::get('GetSubdependencia/{id}', [PconvocatoriaController::class,'GetSubdependencia']);

//Route::resource('/pconvocatorias', PconvocatoriaController::class);
//Route::post('/pconvocatorias/{convocatoria}', [PconvocatoriaController::class,'archivos'])->name('convocatoria.archivos');

// Route::resource('/postulante', PostulanteController::class);

Route::get('/', [IndexController::class, 'index']);
//Route::get('/indexpostular/{convocatoria}', [IndexController::class,'indexpostular'])->name('index.indexpostular');

// Route::post('/postular/{convocatoria}', [IndexController::class,'postular'])->name('index.postular');

Route::get('/reports', [ReportController::class, 'reporte_dia'])->name('reporte_dia');
Route::get('/reports', [ReportController::class, 'reporte_fecha'])->name('reporte_fecha');
Route::get('/reports', [App\Http\Controllers\ReportController::class, 'reporte_dia'])->name('reporte_dia');
Route::get('/reporte_fecha', [App\Http\Controllers\ReportController::class, 'reporte_fecha'])->name('reporte_fecha');
Route::post('/reporte_resultado', [App\Http\Controllers\ReportController::class, 'reporte_resultado'])->name('reporte_resultado');

// Route::post('Equipo/import',[EquipoController::class,'import']);
// Route::get('Equipo/export',[EquipoController::class,'export'])->name('equipos.export');
// Route::get('Reporte-pdf',[ReportController::class,'generar_pdf'])->name('decargar-pdf');