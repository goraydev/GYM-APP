<?php

namespace App\Exports;

use App\Models\pre_inscripcion;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AlumnospreExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function headings(): array
    {
        return [
            'ID',
            'DNI',
            'NOMBRES',
            'APELLIDOS',
            'FECHA DE NACIMIENTO',
            'EDAD',
            'CELULAR',
            'DOMICILIO',
            'CORREO',
            'PESO',
            'TALLA',
            'IMC',
            'GENERO',
            'DEPARTAMENTO',
            'PROVINCIA',
            'DISTRITO',
            'FACULTAD',
            'ESCUELA',
            'SEMESTRE',
            'GRUPO SANGUINEO',
            'FACTOR RH',
            'FECHA DE REGISTRO'
        ];
    }



    public function collection()
    {
        $resultados = DB::table('pre_inscripcions as pre')
            ->select('pre.id', 'pre.dni', 'pre.nombres', 'pre.apellidos', 'pre.f_nacimiento', 'pre.edad', 'pre.celular', 'pre.domicilio', 'pre.correo', 'pre.peso', 'pre.talla', 'pre.imc', 'g.nombre as genero', 'dep.nombre as departamento', 'pro.nombre as provincia', 'dis.nombre as distrito', 'fac.nombre as facultad', 'es.nombre as escuela', 'sem.semestre', 'gs.nombre as grupo_sanguineo', 'frs.nombre as factor_rh', 'pre.created_at')
            ->join('generos as g', 'g.id', '=', 'pre.genero_id')
            ->join('distritos as dis', 'dis.id', '=', 'pre.distrito_id')
            ->join('provincias as pro', 'pro.id', '=', 'dis.provincia_id')
            ->join('departamentos as dep', 'dep.id', '=', 'pro.departamento_id')
            ->join('escuelas as es', 'es.id', '=', 'pre.escuela_id')
            ->join('facultads as fac', 'fac.id', '=', 'es.facultad_id')
            ->join('semestres as sem', 'sem.id', '=', 'pre.semestre_id')
            ->join('gruposanguineos as gs', 'gs.id', '=', 'pre.gruposanguineo_id')
            ->join('factor_rhs as frs', 'frs.id', '=', 'pre.factorRH_id')
            ->get();

        $filas = [];

        foreach ($resultados as $key => $value) {
            $filas[] = [
                $value->id,
                $value->dni,
                $value->nombres,
                $value->apellidos,
                $value->f_nacimiento,
                $value->edad,
                $value->celular,
                $value->domicilio,
                $value->correo,
                $value->peso,
                $value->talla,
                $value->imc,
                $value->genero,
                $value->departamento,
                $value->provincia,
                $value->distrito,
                $value->facultad,
                $value->escuela,
                $value->semestre,
                $value->grupo_sanguineo,
                $value->factor_rh,
                $value->created_at
            ];
        }


        return collect($filas);
    }
}
