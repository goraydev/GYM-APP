<?php

namespace App\Exports;

use App\Models\inscripcion;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AlumnosInscritosExport implements FromCollection, ShouldAutoSize, WithHeadings
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
            'CELULAR',
            'CORREO',
            'RECIBO',
            'MONTO',
            'FECHA DE REGISTRO'
        ];
    }

    public function collection()
    {
        $resultados = DB::table('inscripcions as ins')
            ->select('ins.id', 'pre.dni', 'pre.nombres', 'pre.apellidos',  'pre.celular', 'pre.correo', 'ins.n_recibo', 'ins.monto', 'ins.created_at')
            ->join('pre_inscripcions as pre', 'pre.id', '=', 'ins.preinscripcion_id')
            ->get();

        $filas = [];

        foreach ($resultados as $key => $value) {
            $filas[] = [
                $value->id,
                $value->dni,
                $value->nombres,
                $value->apellidos,
                $value->celular,
                $value->correo,
                $value->n_recibo,
                $value->monto,
                $value->created_at

            ];
        }

        return collect($filas);
    }
}
