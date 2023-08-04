<?php

namespace App\Http\Controllers;

use PDF;
use Dompdf\Dompdf;
use App\Models\Operacion;
use App\Models\Area;
use App\Models\Estado;
use App\Models\Toperacion;
use App\Models\Equipo;
use App\Http\Requests\OperacionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OperacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        session()->flashInput([
            'texto' => '0001MP',
        ]);

        $equipos = Equipo::where('activo', '1')->get();
        $areas = Area::where('activo', '1')->get();
        $estados = Estado::where('activo', '1')->get();
        $toperaciones = Toperacion::where('activo', '1')->get();
        $operaciones = Operacion::get();

        return view('operaciones.index', compact('equipos', 'areas', 'estados', 'toperaciones', 'operaciones'));
    }
    public function store(OperacionRequest $request)
    {
        $operacion = new Operacion();
        $operacion->responsable = request('responsable');
        $operacion->celular = request('celular');
        $operacion->fecha_prestamo = now();
        $operacion->fecha_devolucion = request('fecha_devolucion');
        $operacion->descripcion = request('descripcion');
        $operacion->activo = true;
        $operacion->equipo_id = request('equipo_id');
        $operacion->area_id = request('area_id');
        $operacion->estado_id = request('estado_id');
        $operacion->toperacion_id = request('toperacion_id');
        $operacion->save();
        alert()->success('La Operacion Registrado Correctamente', 'Exito!');

        return redirect()->route('operaciones.index');
    }
    public function show($id)
    {
        $operaciones = Operacion::findOrFail($id);
        return view('operaciones.show', ['operaciones' => $operaciones]);
    }
    public function edit($id)
    {
        $operaciones = Operacion::findOrFail($id);
        return view('operaciones.index', ['operaciones' => $operaciones]);
    }

    public function update(Request $request, $id)
    {
        $operacion = Operacion::findOrFail($id);
        $operacion->responsable = request('responsable');
        $operacion->celular = request('celular');
        $operacion->fecha_prestamo = now();
        $operacion->fecha_devolucion = request('fecha_devolucion');
        $operacion->descripcion = request('descripcion');
        $operacion->activo = true;
        $operacion->equipo_id = request('equipo_id');
        $operacion->area_id = request('area_id');
        $operacion->estado_id = request('estado_id');
        $operacion->toperacion_id = request('toperacion_id');
        $operacion->save();
        alert()->success('Equipo fue actualizado correctamente', 'Exito!');
        return redirect('operaciones');
    }
    public function destroy($id)
    {
        $operacion = Operacion::findOrFail($id);
        $operacion->delete();
        alert()->success('El Operacion Fue Eliminado', 'Exito!');
        return redirect('operaciones');
    }
    public function altabaja($estado, $id)
    {
        $operacion = Operacion::findOrFail($id);
        if ($estado == '1') {
            $operacion->activo = '0';
            $operacion->save();
            alert()->success('La Operacion Fue Desactivado', 'Exito!');
        } else {
            $operacion->activo = '1';
            alert()->success('La Operacion Fue Activado', 'Exito!');
            $operacion->save();
        }
        return redirect('operaciones');
    }
    public function imprimir($id)
    {
        $operaciones = Operacion::find($id);
        $view =  \View::make('operaciones.reporte-pdf', compact('operaciones', $operaciones))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->download("reporte.pdf");
    }
    public function buscar(Request $request)
    {

        $texto = trim($request->get('texto'));

        $equipo = Equipo::where('serie', $texto)->first();

        if (is_null($equipo)) {
            session()->flashInput([
                'texto' => $texto,
            ]);
            return redirect()->route('operaciones.index')->with('buscar', '')->with('errequipo', 'Equipo mo encontrado');
        } else {
            session()->flashInput([
                'texto' => $texto,
                'equipo' => $equipo->nombre,
                'equipo_id' => $equipo->id,
            ]);
            return redirect()->route('operaciones.index')->with('buscar', '');
        }
    }
}
