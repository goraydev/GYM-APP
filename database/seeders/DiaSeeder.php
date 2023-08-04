<?php

namespace Database\Seeders;

use App\Models\Dia;
use Illuminate\Database\Seeder;

class DiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "id" => 1,
                "nombre" => "Lunes"
            ],
            [
                "id" => 2,
                "nombre" => "Martes"
            ],
            [
                "id" => 3,
                "nombre" => "Miercoles"
            ],
            [
                "id" => 4,
                "nombre" => "Jueves"
            ],
            [
                "id" => 5,
                "nombre" => "Viernes"
            ]
        ];

        Dia::insert($data);
    }
}
