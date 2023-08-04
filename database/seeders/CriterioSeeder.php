<?php

namespace Database\Seeders;

use App\Models\Criterio;
use Illuminate\Database\Seeder;

class CriterioSeeder extends Seeder
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
                "nombre" => "HTA (Hipertensión Arterial)"
            ],
            [
                "id" => 2,
                "nombre" => "DIABETES (Glucosa > 110)"
            ],
            [
                "id" => 3,
                "nombre" => "ARRITMIAS"
            ],
            [
                "id" => 4,
                "nombre" => "ANGINA (Dolor de pecho)"
            ],
            [
                "id" => 5,
                "nombre" => "INFARTO ( antecedente)"
            ],
            [
                "id" => 6,
                "nombre" => "IMC >=35"
            ],
            [
                "id" => 7,
                "nombre" => "Dolor Osteo Muscular"
            ],
            [
                "id" => 8,
                "nombre" => "Edad > 45 años"
            ],
            [
                "id" => 9,
                "nombre" => "COLESTEROL"
            ],
            [
                "id" => 10,
                "nombre" => "TRIGLICERIDOS"
            ],
            [
                "id" => 11,
                "nombre" => "IMC >=30"
            ]
        ];

        Criterio::insert($data);
    }
}
