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
use App\Models\inscripcion;
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
        $imc = $preinscripcion->peso / (($preinscripcion->talla / 100) * ($preinscripcion->talla / 100));
        $preinscripcion->imc = round($imc, 2);
        $preinscripcion->activo = true;
        $preinscripcion->genero_id = request('genero_id');
        $preinscripcion->distrito_id = request('distrito_id');
        $preinscripcion->semestre_id = request('semestre_id');
        $preinscripcion->escuela_id = request('escuela_id');
        $preinscripcion->gruposanguineo_id = request('gruposanguineo_id');
        $preinscripcion->factorRh_id = request('factorRh_id');
        $preinscripcion->escuela_id = request('escuela_id');

        $preinscripcion->save();
        alert()->success('La pre-inscripción se ha registrado correctamente', 'Exito!');

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
    public function edit(pre_inscripcion $id)
    {


        $generos = Genero::get();
        $semestres = Semestre::where('activo', 1)->get();
        $departamentos = Departamento::get();
        $provincias = Provincia::get();
        $distritos = Distrito::get();
        $facultades = Facultad::get();
        $escuelas = Escuela::get();
        $gruposanguineos = Gruposanguineo::get();
        $factor_rhs = FactorRh::get();

        return view('preinscripciones.editar', compact('id', 'generos', 'semestres', 'departamentos', 'provincias', 'distritos', 'facultades', 'escuelas', 'gruposanguineos', 'factor_rhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pre_inscripcion  $pre_inscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pre_inscripcion $id)
    {

        $id->dni = $request->dni;
        $id->nombres = $request->nombres;
        $id->apellidos = $request->apellidos;
        $id->f_nacimiento = $request->f_nacimiento;
        $id->edad = $request->edad;

        $id->celular = $request->celular;
        $id->correo = $request->correo;
        $id->domicilio = $request->domicilio;
        $id->peso = $request->peso;
        $id->talla = $request->talla;
        $imc = $request->peso / (($request->talla / 100) * ($request->talla / 100));
        $id->imc = round($imc, 2);


        $id->genero_id = ($request->genero_id !== null && $request->genero_id !== $id->genero_id) ? $request->genero_id : $id->genero_id;
        $id->distrito_id = ($request->distrito_id !== "0" && $request->distrito_id !== $id->distrito_id) ? $request->distrito_id : $id->distrito_id;
        $id->semestre_id = ($request->semestre_id !== null && $request->semestre_id !== $id->semestre_id) ? $request->semestre_id : $id->semestre_id;
        $id->escuela_id = ($request->escuela_id !== "0" && $request->escuela_id !== $id->escuela_id) ? $request->escuela_id : $id->escuela_id;
        $id->gruposanguineo_id = ($request->gruposanguineo_id !== null && $request->gruposanguineo_id !== $id->gruposanguineo_id) ? $request->gruposanguineo_id : $id->gruposanguineo_id;
        $id->factorRh_id = ($request->factorRh_id !== null && $request->factorRh_id !== $id->factorRh_id) ? $request->factorRh_id : $id->factorRh_id;

        $id->save();

        alert()->success('La pre-inscripción se actualizó correctamente', 'Exito!');
        return redirect()->route('preinscripciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pre_inscripcion  $pre_inscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(pre_inscripcion $id)
    {
        $inscrito = inscripcion::where('preinscripcion_id', $id->id)->first();

        if ($inscrito->id ?? "") {
            alert()->error('Alumno actual tiene una inscripción', 'Error!');
            return redirect()->route('preinscripciones.index');
        }


        $id->delete();
        alert()->success('La pre-inscripción se eliminó correctamente', 'Exito!');


        return redirect()->route('preinscripciones.index');
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

        return view('criterios.create', compact('preinscripcion', 'criterios', 'opciones', 'respuestas'));
    }

    public function actualizarestado($estadoactual, $id)
    {

        $nuevoEstado = $estadoactual == 1 ? 0 : 1;

        $preinscrito = pre_inscripcion::find($id);


        if ($preinscrito) {
            $preinscrito->activo = $nuevoEstado;
            $preinscrito->save();
        }

        return redirect()->route('preinscripciones.index');
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
        Route::get('preinscripcion/criterio/{id}', [PreInscripcionController::class, 'criterio'])->name('persona_criterio');
        Route::get('preinscripcion/editar/{id}', [PreInscripcionController::class, 'edit']);
        Route::put('preinscripcion/{id}', [PreInscripcionController::class, 'update'])->name('preinscripcion.update');
        Route::delete('preinscripcion/{id}', [PreInscripcionController::class, 'destroy'])->name('preinscripcion.destroy');
        Route::get('preinscripcion/altabaja/{estado}/{id}', [PreInscripcionController::class, 'actualizarestado']);


        //Route::get('Cargo/altabaja/{estado}/{id}',[CargoController::class,'altabaja']);
    }
}
