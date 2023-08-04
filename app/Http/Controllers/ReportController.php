<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Dompdf\Dompdf;
use App\Models\Area;
use App\Models\Estado;
use App\Models\Equipo;
use App\Models\Operacion;
use App\Models\Toperacion;
use Carbon\Carbon;

class ReportController extends Controller
{


    public function reporte_dia(){
       
        $operaciones = Operacion::whereDate('fecha_prestamo', now()->format('Y-m-d'))->get();
        
        return view('reports.report_dia', compact('operaciones'));
    }
    public function reporte_fecha(Request $request){
       
        session()->flashInput([
            'fecha_fin'=>now()->format('Y-m-d'),

        ]);
        $operaciones = Operacion::whereDate('fecha_prestamo', now()->format('Y-m-d'))->get();
        return view('reports.report_fecha',compact('operaciones'));
    } 

    public function reporte_resultado(Request $request){

        
        $fi = $request->fecha_ini.' 00:00:00';
        $ff = $request->fecha_fin.' 23:59:59';
        // dd($fi);
        session()->flashInput($request->input());
        $operaciones = Operacion::whereBetween('fecha_prestamo', [$fi, $ff])->get();
        return view('reports.report_fecha',compact('operaciones'));
    }
    
    public function generar_pdf(Request $request){
        $fi = $request->fecha_ini.' 00:00:00';
        $ff = $request->fecha_fin.' 23:59:59';
        $operaciones = Operacion::whereBetween('fecha_prestamo', [$fi, $ff])->get();

        $datos=[
            'operaciones'=>$operaciones,
            'titulo'=>'  Desde '.$fi.' hasta '.$ff
        ];

        $view =  \View::make('reports.report_fecha_pdf', $datos)->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
    
        // return $pdf->download("reporte.pdf");
        return $pdf->stream("reporte.pdf");
    }


}
