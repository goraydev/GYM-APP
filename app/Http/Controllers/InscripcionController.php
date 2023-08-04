<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Dia;
use App\Models\Distrito;
use App\Models\Escuela;
use App\Models\Genero;
use App\Models\Horario;
use App\Models\inscripcion;
use App\Models\inscripcion_clase;
use App\Models\pre_inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use DB;
use Dotenv\Validator;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscripciones = pre_inscripcion::select('pre_inscripcions.id', 'pre_inscripcions.dni', 'pre_inscripcions.apellidos', 'pre_inscripcions.nombres', 'inscripcions.n_recibo', 'inscripcions.estado')
            ->leftjoin('inscripcions', 'pre_inscripcions.id', '=', 'inscripcions.preinscripcion_id')
            ->get();;

        return view('inscripciones.index', compact('inscripciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $preinscripciones = pre_inscripcion::get();
        $inscripciones = inscripcion::get();
        $horarios = Horario::get();
        $dias = Dia::get();
        $user = pre_inscripcion::find($id);

        return view('inscripciones.create', compact('preinscripciones', 'inscripciones', 'horarios', 'dias', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function filtrar_turno($valor)
    {
        return $valor != "Seleccionar turno";
    }
    public function store(Request $request)
    {


        $inscripcion = new inscripcion();
        $inscripcion->n_recibo = request('n_recibo');
        $inscripcion->monto = request('monto');
        $inscripcion->preinscripcion_id = request('userId');


        $dia_ids = $request->input('dia_id');
        $turnos = $request->input('turno');

        // Asegúrate de que hay al menos un día seleccionado antes de procesar los datos.
        if ($dia_ids && is_array($dia_ids)) {
            // Combina los ID de día con los ID de turno correspondientes.
            $data = array_combine($dia_ids, $turnos);
            // Ahora, puedes iterar sobre los datos combinados y procesar cada día y turno.
            foreach ($data as $dia_id => $turno_id) {


                if ($turno_id == null) {
                    continue;
                }


                $inscripcionClases = new inscripcion_clase();
                $inscripcionClases->user_id = request('userId');
                $inscripcionClases->dia_id = $dia_id;
                $inscripcionClases->turno_id = $turno_id;
                $inscripcionClases->save();
            }
        }


        $inscripcion->save();
        alert()->success('La Inscripcion se Registrado Correctamente', 'Exito!');

        return redirect()->route('inscripciones.index');
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function show(inscripcion $inscripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(inscripcion $inscripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inscripcion $inscripcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(inscripcion $inscripcion)
    {
        //
    }

    public function registrar($id)
    {
        $preinscripcion = pre_inscripcion::findOrFail($id);
        return view('inscripciones.create', compact('preinscripcion'));
    }
    public function asignarcurso($id)
    {
        $preinscripciones = pre_inscripcion::findOrFail($id);
        $inscripciones = inscripcion::findOrFail($id);
        $respuestas = [];
        foreach ($inscripciones->inscripciones as $value) {
            $clase = Clase::find($value->clase_id);
            $dia = Dia::find($value->dia_id);
            $hoario = Horario::find($value->horario_id);

            $respuestas[] = [
                'id' => $value->id,
                'clase' => $clase->nombre,
                'dia' => $dia->nombre,
                'horario' => $hoario->horario,
            ];
        }

        $clases = Clase::get();
        $horarios = Horario::get();
        $dias = Dia::get();
        return view('asignarcursos.create', compact('clases', 'preinscripciones', 'inscripciones', 'respuestas', 'horarios', 'dias'));
    }
    public static function RegisterInscripcionRoutes()
    {
        Route::resource('/inscripciones', InscripcionController::class);
        Route::get('inscripciones/create/{id}', [InscripcionController::class, 'create']);
        Route::get('asignarcurso/{id}', [InscripcionController::class, 'asignarcurso'])->name('asignarcurso');
        //Route::get('Cargo/altabaja/{estado}/{id}',[CargoController::class,'altabaja']);
    }
}
