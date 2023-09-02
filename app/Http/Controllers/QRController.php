<?php

namespace App\Http\Controllers;

use App\Models\inscripcion;
use App\Models\registro_asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class QRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("qrasistencia.index");
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


        $existe = DB::table('inscripcions as ins')
            ->select('*')
            ->join('pre_inscripcions as p', 'ins.preinscripcion_id', '=', 'p.id')
            ->where('p.dni', '=', $request->dni_user) // Reemplaza $dni con el número de DNI que estás buscando
            ->first();

        if ($existe) {
            $registro_asistencia = new registro_asistencia();
            $registro_asistencia->user_id = $existe->id;
            $registro_asistencia->control_id = $request->control_id;
            $registro_asistencia->save();
            alert()->success("{$existe->nombres} ya te registraste con éxito");
            return redirect()->route('asistenciaqr');
        }

        alert()->error('Alumno(a) no está registrado(a) en nuestra base de datos', 'Error!');
        return redirect()->route('asistenciaqr');
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

    public static function RegisterAsistenciaporQR()
    {

        Route::resource('/asistenciaqr', QRController::class);
        Route::get('asistenciaqr', [QRController::class, 'index'])->name('asistenciaqr');
    }
}
