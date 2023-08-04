<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Dia;
use App\Models\Horario;
use App\Models\inscripcion;
use App\Models\inscripcion_clase;
use App\Models\pre_inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class InscripcionClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $preinscripcion = pre_inscripcion::get();
        $inscripciones = inscripcion::get();
        $clases = Clase::get();
        $dias = Dia::get();
        $horarios = Horario::get();
        return view('asignarcursos.create', compact('preinscripcion','clases','dias','horarios','inscripciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inscripcio_clases = new inscripcion_clase();
        $inscripcio_clases->inscripcion_id = request('inscripcion_id');
        $inscripcio_clases->clase_id = request('clase_id');
        $inscripcio_clases->dia_id = request('dia_id');
        $inscripcio_clases->horario_id = request('horario_id');
        //dd($inscripcio_clases);
        $inscripcio_clases->save();
        alert()->success('La Pre-inscripcion se Registrado Correctamente','Exito!');

      return redirect()->route('asignarcurso',['id' => $inscripcio_clases->inscripcion_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inscripcion_clase  $inscripcion_clase
     * @return \Illuminate\Http\Response
     */
    public function show(inscripcion_clase $inscripcion_clase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inscripcion_clase  $inscripcion_clase
     * @return \Illuminate\Http\Response
     */
    public function edit(inscripcion_clase $inscripcion_clase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inscripcion_clase  $inscripcion_clase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inscripcion_clase $inscripcion_clase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inscripcion_clase  $inscripcion_clase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,inscripcion_clase $inscripcion_clase)
    {
        $inscripcion_id=$inscripcion_clase->inscripcion_clases;

        $inscripcion_id=$inscripcion_id->id;
         //dd($inscripcion_id);
        $inscripcion_clase->delete();
        alert()->success('Registro Eliminado Correctamente','Exito!');
        return redirect()->route('asignarcurso',['id' => $inscripcion_id]);
    }
    public static function RegisterInscripcionClaseRoutes(){
        Route::resource('/asignarcursos', InscripcionClaseController::class);
        //Route::get('Preinscripcion/criterio/{id}',[PreInscripcionController::class,'criterio']);
        //Route::get('Cargo/altabaja/{estado}/{id}',[CargoController::class,'altabaja']);
        Route::get('/elimina_clase/{inscripcion_clase}',[self::class,'destroy'])->name('delete_item_clase');
    }
}
