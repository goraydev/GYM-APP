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
            ->get();

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


    public function store(Request $request)
    {


        $inscripcion = new inscripcion();
        $inscripcion->n_recibo = request('n_recibo');
        $inscripcion->monto = request('monto');
        $inscripcion->preinscripcion_id = request('userId');


        $dia_ids = $request->input('dia_id');
        $turnos = $request->input('turno');

        $haySeleccionados = false;

        foreach ($turnos as $index => $turno) {
            if ($turno != null) {
                $haySeleccionados = true;
                break;
            }
        }

        if (!$haySeleccionados) {

            alert()->error('Seleccione al menos un día y turno', 'Error!');
            return back();
        }


        if ($dia_ids && is_array($dia_ids)) {

            $data = array_combine($dia_ids, $turnos);

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
        alert()->success('La inscripcion se ha registrado correctamente', 'Exito!');

        return redirect()->route('inscripciones.index');
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $preinscrito = pre_inscripcion::find($id);
        $inscrito = inscripcion::where('preinscripcion_id', $id)->first();
        $dia_turno = inscripcion_clase::where('user_id', $id)->get();

        $horarios = Horario::get();
        $dias = Dia::get();

        return view('inscripciones.show', compact('preinscrito', 'inscrito', 'dia_turno', 'horarios', 'dias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = inscripcion::where('preinscripcion_id', $id)->first();
        $preinscrito = pre_inscripcion::find($id);
        $horarios = Horario::get();
        $dias = Dia::get();


        return view('inscripciones.editar', compact('user', 'preinscrito', 'horarios', 'dias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inscripcion $id)
    {

        $id->n_recibo = $request->n_recibo;
        $id->monto = $request->monto;

        $dia_ids = $request->input('dia_id');
        $turnos = $request->input('turno');
        $haySeleccionados = false;

        foreach ($turnos as $index => $turno) {
            if ($turno != null) {
                $haySeleccionados = true;
                break;
            }
        }
        if ($haySeleccionados) {
            $existeData = inscripcion_clase::where(
                'user_id',
                request('userId')
            )->get();

            foreach ($existeData as $registro) {
                $registro->delete();
            }

            if ($dia_ids && is_array($dia_ids)) {

                $data = array_combine($dia_ids, $turnos);

                foreach ($data as $dia_id => $turno_id) {


                    if ($turno_id == null) {
                        continue;
                    }

                    //si es un nuevo dia y turno seleccionado
                    $inscripcionClases = new inscripcion_clase();
                    $inscripcionClases->user_id = request('userId');
                    $inscripcionClases->dia_id = $dia_id;
                    $inscripcionClases->turno_id = $turno_id;
                    $inscripcionClases->save();
                }
            }
        }


        $id->save();
        alert()->success('La inscripción se actualizó correctamente', 'Exito!');
        return redirect()->route('inscripciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = inscripcion::where('preinscripcion_id', $id)->first();
        if ($user) {
            $user->delete();
            alert()->success('La inscripción se eliminó correctamente', 'Exito!');
        }
        $existeData = inscripcion_clase::where(
            'user_id',
            $id
        )->get();

        if ($existeData) {

            foreach ($existeData as $registro) {
                $registro->delete();
            }
        }



        return redirect()->route('inscripciones.index');
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
        Route::get('inscripcion/mostrar/{id}', [InscripcionController::class, 'show']);
        Route::get('inscripcion/editar/{id}', [InscripcionController::class, 'edit']);
        Route::put('inscripcion/{id}', [InscripcionController::class, 'update'])->name('inscripcion.update');
        Route::delete('inscripcion/{id}', [InscripcionController::class, 'destroy'])->name('inscripcion.destroy');
    }
}
