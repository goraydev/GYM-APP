<?php

namespace App\Exports;

use App\Models\Equipo;
use App\Models\Categoria;
use App\Models\Marca;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EquipoExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'ID',
            'NOMBRES',
            'DESCRIPCION',
            'COLOR',
            'MODELO',
            'CATEGORIA',
            'MARCA',
            'FECHA DE REGISTRO',
        ];
    }
    public function collection()
    {
        $equipos=Equipo::all();

        $filas=[];

        foreach ($equipos as $key => $equipo) {
            $filas[]=[
                $equipo->id,
                $equipo->nombre,
                $equipo->descripcion,
                $equipo->color,
                $equipo->modelo,
                $equipo->categorias->nombre,
                $equipo->marcas->nombre,
                $equipo->created_at,

            ];
        }

       return collect($filas);
    }
}
