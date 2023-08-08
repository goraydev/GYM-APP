<?php

namespace Database\Seeders;

use App\Models\ControlAsistencia;
use Illuminate\Database\Seeder;

class ControlAsistenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                "id" => 1,
                "nombre" => "Entrada"
            ],
            [
                "id" => 2,
                "nombre" => "Salida"
            ]
        ];

        ControlAsistencia::insert($data);
    }
}
