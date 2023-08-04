<?php

namespace App\Http\Controllers;

use App\Models\Persona_criterio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PersonaCriterioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $percriterios = new Persona_criterio();
        $percriterios->criterio_id = request('criterio_id');
        $percriterios->opcion_id = request('opcion_id');
        $percriterios->preinscripcion_id = request('preinscripcion_id');
        $percriterios->comentario = request('comentario');
        // dd($percriterios);
        $percriterios->save();
        alert()->success('La Pre-inscripcion se Registrado Correctamente','Exito!');

      return redirect()->route('persona_criterio',['id' => $percriterios->preinscripcion_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona_criterio  $persona_criterio
     * @return \Illuminate\Http\Response
     */
    public function show(Persona_criterio $persona_criterio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona_criterio  $persona_criterio
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona_criterio $persona_criterio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona_criterio  $persona_criterio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona_criterio $persona_criterio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona_criterio  $persona_criterio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Persona_criterio $persona_criterio)
    {
        $pre_inscripcion_id=$persona_criterio->preinscripcion;

        $pre_inscripcion_id=$pre_inscripcion_id->id;
        dd($pre_inscripcion_id);
        $persona_criterio->delete();
        alert()->success('Registro Eliminado Correctamente','Exito!');
        return redirect()->route('persona_criterio',['id' => $pre_inscripcion_id]);
    }
    public static function RegisterPreCriterioscionRoutes(){
        Route::resource('/precriterios', PersonaCriterioController::class);
        //Route::get('Preinscripcion/criterio/{id}',[PreInscripcionController::class,'criterio']);
        //Route::get('Cargo/altabaja/{estado}/{id}',[CargoController::class,'altabaja']);
        Route::get('/elimina_percriterio/{persona_criterio}',[self::class,'destroy'])->name('delete_item_percriterio');
    }
}
