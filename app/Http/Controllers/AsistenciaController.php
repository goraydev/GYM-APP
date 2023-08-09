<?php

namespace App\Http\Controllers;

use App\Models\ControlAsistencia;
use App\Models\pre_inscripcion;
use App\Models\registro_asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $alumnospre_inscritos = pre_inscripcion::get();

        return view('asistencias.index', compact('alumnospre_inscritos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $registro_asistencia = new registro_asistencia();
        $registro_asistencia->user_id = $request->user_id;
        $registro_asistencia->control_id = $request->control_id;
        $registro_asistencia->save();
        alert()->success('Se ha registrado la asistencia correctamente', 'Exito!');
        return redirect()->route('asistencias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $asistencias = registro_asistencia::where('user_id', $id)->get();
        $controles = ControlAsistencia::get();
        $datosalumno = pre_inscripcion::find($id);

        return view('asistencias.show', compact('asistencias', 'datosalumno', 'controles'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function RegisterAsistenciaRoutes()
    {
        Route::resource('/asistencias', AsistenciaController::class);
        Route::get('/asistencias/mostrar/{id}', [AsistenciaController::class, 'show']);
    }
}
