<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Dompdf\Dompdf;
use App\Models\Area;
use App\Models\Estado;
use App\Models\Equipo;
use App\Models\Operacion;
use App\Models\pre_inscripcion;
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

    public function reporte_general()
    {

        return view('reports.reporte_general');
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


    public static function ReportRoutes()
    {

        Route::get('reporte_general', [ReportController::class, 'reporte_general'])->name('reporte_general');
        Route::get('reporte_progreso', [ReportController::class, 'reporte_progreso'])->name('reporte_progreso');
        Route::get('reporte_progreso/alumno/{id}', [ReportController::class, 'show']);
    }
}
