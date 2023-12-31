<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Dompdf\Dompdf;
use App\Models\Area;
use App\Models\Estado;
use App\Models\Equipo;
use App\Models\inscripcion;
use App\Models\Operacion;
use App\Models\pre_inscripcion;
use App\Models\progreso_alumno;
use App\Models\registro_asistencia;
use App\Models\Toperacion;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ReportController extends Controller
{

    public function alumnosporfacultad()
    {
        $results = DB::table('facultads as f')
            ->select('f.abrev as facultad', DB::raw('COUNT(p.id) as cantidad_alumnos'))
            ->join('escuelas as e', 'f.id', '=', 'e.facultad_id')
            ->join('pre_inscripcions as p', 'e.id', '=', 'p.escuela_id')
            ->groupBy('f.id', 'f.abrev')->orderBy('f.abrev', 'ASC')
            ->get();
        return response()->json($results);
    }

    public function alumnosporescuela()
    {
        $results = DB::table('escuelas as es')
            ->select('es.nombre as escuela', DB::raw('COUNT(p.id) as cantidad_alumnos'))
            ->join('pre_inscripcions as p', 'es.id', '=', 'p.escuela_id')
            ->groupBy('es.id', 'es.nombre')->orderBy('es.nombre', 'ASC')
            ->get();

        return response()->json($results);
    }
    

    public function alumnosporgenero()
    {

        $results = DB::table('generos as g')
            ->select('g.id as genero', DB::raw('COUNT(p.id) as cantidad_alumnos'))
            ->join('pre_inscripcions as p', 'g.id', '=', 'p.genero_id')
            ->groupBy('g.id')
            ->orderBy('g.id', 'ASC')
            ->get();

        return response()->json($results);
    }

    public function reporte_alumno($idalumno)
    {
        $pesoinicial = pre_inscripcion::select('id as user_id', 'peso', 'created_at')->find($idalumno);
        $results = progreso_alumno::select('user_id', 'peso_nuevo as peso', 'created_at')->where('user_id', $idalumno)->get();

        // Convertir el objeto inicial a un array asociativo
        $pesoinicialArray = $pesoinicial ? $pesoinicial->toArray() : [];

        $responseData = array_merge([$pesoinicialArray], $results->toArray());


        return response()->json($responseData);
    }

    public function reporte_general()
    {

        $inicioMes = now()->startOfMonth(); // Fecha de inicio del mes actual
        $finMes = now()->endOfMonth();     // Fecha de fin del mes actual

        $totalAsistencias = registro_asistencia::whereBetween('created_at', [$inicioMes, $finMes])->count();
        $totalMontoRecaudado = inscripcion::whereBetween('created_at', [$inicioMes, $finMes])->sum('monto');
        $totalPreinscritos = pre_inscripcion::whereBetween('created_at', [$inicioMes, $finMes])->count();
        $totalInscritos = inscripcion::whereBetween('created_at', [$inicioMes, $finMes])->count();


        return view('reports.reporte_general', compact('totalAsistencias', 'totalMontoRecaudado', 'totalPreinscritos', 'totalInscritos'));
    }

    public function reporte_progreso()
    {
        $alumnospre_inscritos = pre_inscripcion::get();
        return view('reports.reporte_progreso', compact('alumnospre_inscritos'));;
    }

    public function show($id)
    {
        $datosalumno = pre_inscripcion::find($id);
        return view('reports.reporte_por_alumno', compact('datosalumno'));
    }

    public function store(Request $request)
    {

        $progresoalumno = new progreso_alumno();
        $progresoalumno->user_id = $request->user_id;
        $progresoalumno->peso_nuevo = $request->peso_nuevo;
        $progresoalumno->save();
        alert()->success('Peso registrado correctamente', 'Exito!');
        return back();
    }


    public static function ReportRoutes()
    {

        Route::resource('/reporte_general', ReportController::class);
        Route::get('reporte_general', [ReportController::class, 'reporte_general'])->name('reporte_general');
        Route::get('reporte_progreso', [ReportController::class, 'reporte_progreso'])->name('reporte_progreso');
        Route::get('reporte_progreso/alumno/{id}', [ReportController::class, 'show']);
        Route::post('reporte_progreso/alumno', [ReportController::class, 'store'])->name('registrar_peso');
    }
}
