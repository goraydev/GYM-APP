<?php

namespace App\Imports;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Equipo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class EquipoImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $categorias, $marcas;
    public function __construct()
    {
        $this->categorias = Categoria::pluck('id','nombre');
        $this->marcas = Marca::pluck('id','nombre');
    }

    public function model(array $row)
    {
        return new Equipo([
            'serie'  => $row['serie'],
            'nombre' => $row['nombre'],
            'descripcion' => $row['descripcion'],
            'color' => $row['color'],
            'modelo' => $row['modelo'],
            'categoria_id' => $this->categorias[$row['categoria']],
            'marca_id' =>  $this->marcas[$row['marca']],

        ]);
    }
    public function batchSize(): int
    {
        return 10;
    }
    public function chunkSize(): int
    {
        return 10;
    }
}
