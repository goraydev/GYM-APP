<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Escuela;
use App\Models\FactorRh;
use App\Models\Facultad;
use App\Models\Genero;
use App\Models\Gruposanguineo;
use App\Models\Opcion;
use App\Models\pre_inscripcion;
use App\Models\Provincia;
use App\Models\Semestre;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PreInscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generos = Genero::get();
        $distritos = Distrito::get();
        $escuelas = Escuela::get();
        $preinscripcion = pre_inscripcion::get();

        return view('preinscripciones.index', compact('generos', 'distritos', 'escuelas', 'preinscripcion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $preinscripcion = pre_inscripcion::get();
        $generos = Genero::get();
        $semestres = Semestre::where('activo', 1)->get();
        $departamentos = Departamento::get();
        $provincias = Provincia::get();
        $distritos = Distrito::get();
        $facultades = Facultad::get();
        $escuelas = Escuela::get();
        $gruposanguineos = Gruposanguineo::get();
        $factor_rhs = FactorRh::get();
        return view('preinscripciones.create', compact('preinscripcion', 'generos', 'semestres', 'departamentos', 'provincias', 'distritos', 'facultades', 'escuelas', 'gruposanguineos', 'factor_rhs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $preinscripcion = new pre_inscripcion();
        $preinscripcion->dni = request('dni');
        $preinscripcion->nombres = request('nombres');
        $preinscripcion->apellidos = request('apellidos');
        $preinscripcion->f_nacimiento = request('f_nacimiento');
        $preinscripcion->edad = Carbon::parse($preinscripcion->f_nacimiento)->age;
        $preinscripcion->celular = request('celular');
        $preinscripcion->correo = request('correo');
        $preinscripcion->domicilio = request('domicilio');
        $preinscripcion->peso = request('peso');
        $preinscripcion->talla = request('talla');
        $preinscripcion->imc = ($preinscripcion->peso) / (($preinscripcion->talla) ^ (2));
        $preinscripcion->activo = true;
        $preinscripcion->genero_id = request('genero_id');
        $preinscripcion->distrito_id = request('distrito_id');
        $preinscripcion->semestre_id = request('semestre_id');
        $preinscripcion->escuela_id = request('escuela_id');
        $preinscripcion->gruposanguineo_id = request('gruposanguineo_id');
        $preinscripcion->factorRh_id = request('factorRh_id');
        $preinscripcion->escuela_id = request('escuela_id');
        
        $preinscripcion->save();
        alert()->success('La Pre-inscripcion se Registrado Correctamente', 'Exito!');

        return redirect()->route('preinscripciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pre_inscripcion  $pre_inscripcion
     * @return \Illuminate\Http\Response
     */
    public function show(pre_inscripcion $pre_inscripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pre_inscripcion  $pre_inscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(pre_inscripcion $pre_inscripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pre_inscripcion  $pre_inscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pre_inscripcion $pre_inscripcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pre_inscripcion  $pre_inscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(pre_inscripcion $pre_inscripcion)
    {
        //
    }

    public function criterio($id)
    {
        $preinscripcion = pre_inscripcion::findOrFail($id);

        $respuestas = [];
        foreach ($preinscripcion->personas_criterios as $value) {
            $criterio = Criterio::find($value->criterio_id);
            $opcion = Opcion::find($value->opcion_id);

            $respuestas[] = [
                'id' => $value->id,
                'criterio' => $criterio->nombre,
                'opcion' => $opcion->nombre,
                'comentario' => $value->comentario,
            ];
        }


        $criterios = Criterio::get();
        $opciones = Opcion::get();

        return view('criterios.create', compact('preinscripcion', 'criterios', 'opciones','respuestas'));
    }
    public function listaescuelas(Facultad $facultad)
    {

        return response()->json($facultad->escuelas);
    }

    public function listaprovincia(Departamento $departamento)
    {

        return response()->json($departamento->provincias);
    }
    public function listadistrito(Provincia $provincia)
    {

        return response()->json($provincia->distritos);
    }
    public static function RegisterPreinscripcionRoutes()
    {
        Route::resource('/preinscripciones', PreInscripcionController::class);
        Route::get('Preinscripcion/criterio/{id}', [PreInscripcionController::class, 'criterio'])->name('persona_criterio');
        //Route::get('Cargo/altabaja/{estado}/{id}',[CargoController::class,'altabaja']);
    }
}
