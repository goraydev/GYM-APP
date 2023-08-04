<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Equipo;
use App\Http\Requests\EquipoRequest;
use Illuminate\Http\Request;
use App\Imports\EquipoImport;
use App\Exports\EquipoExport;
use Maatwebsite\Excel\Excel as SEXCEL;
use Maatwebsite\Excel\Facades\Excel;

class EquipoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categorias = Categoria::where('activo', '1')->get();
        $marcas = Marca::where('activo', '1')->get();
        $equipos = Equipo::get();

      return view('equipos.index', compact('equipos','categorias','marcas'));
    }
    public function store(EquipoRequest $request)
    {
        $equipo = new Equipo();
        $equipo->serie = request('serie');
        $equipo->nombre = request('nombre');
        $equipo->descripcion = request('descripcion');
        $equipo->cantidad = request('cantidad');
        $equipo->color = request('color');
        $equipo->precio = request('precio');
        $equipo->modelo = request('modelo');
        $equipo->activo = true;
        $equipo->categoria_id = request('categoria_id');
        $equipo->marca_id = request('marca_id');
        $equipo->save();
        alert()->success('La equipo Registrado Correctamente','Exito!');

      return redirect()->route('equipos.index');
    }

    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);
      return view('equipos.index', ['equipo' => $equipo]);

    }

    public function update(Request $request, $id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->serie = request('serie');
        $equipo->nombre = request('nombre');
        $equipo->descripcion = request('descripcion');
        $equipo->cantidad = request('cantidad');
        $equipo->color = request('color');
        $equipo->precio = request('precio');
        $equipo->modelo = request('modelo');
        $equipo->activo = true;
        $equipo->categoria_id = request('categoria_id');
        $equipo->marca_id = request('marca_id');
        $equipo->save();
         alert()->success('Equipo fue actualizado correctamente','Exito!');
         return redirect('equipos');
    }
    public function destroy($id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->delete();
        alert()->success('El Equipo Fue Eliminado','Exito!');
        return redirect('equipos');
    }
    public function altabaja($estado, $id)
    {
        $equipo = Equipo::findOrFail($id);
        if ($estado == '1') {
            $equipo->activo = '0';
            $equipo->save();
            alert()->success('La Equipo Fue Desactivado','Exito!');
        } else {
            $equipo->activo = '1';
            alert()->success('La Equipo Fue Activado','Exito!');
            $equipo->save();
        }
        return redirect('equipos');
    }
    public function equipo_operacion($estado, $id)
    {
        $equipo = Equipo::findOrFail($id);
        if ($estado == '1') {
            $equipo->activo = '0';
            $equipo->save();
            alert()->success('La Equipo Fue Desactivado','Exito!');
            
        } else {
            $equipo->activo = '1';
            alert()->success('La Equipo Fue Activado','Exito!');
            $equipo->save();
        }
        return view('/operaciones.index');
    }
    public function import(Request $request)
    {
      $file = $request->file('import_file');
      Excel::import(new EquipoImport, $file);
      alert()->success('Equipos Importados','Exitosamente!');  
      return redirect('equipos');
    }
    public function export()
    {
        return Excel::download(new EquipoExport, 'autoridades.xlsx');
        //return (new EquipoExport)->download('equipos.pdf',SEXCEL::DOMPDF);
        //return Excel::download(new EquipoExport, 'equipos.pdf', \Maatwebsite\Excel\Excel::DOMPDF);

    }
}
