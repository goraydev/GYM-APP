<?php

namespace Database\Seeders;

use App\Models\Facultad;
use Illuminate\Database\Seeder;

class FacultadSeeder extends Seeder
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
                "nombre" => "Ciencias",
                "abrev" => "FC"
            ],
            [
                "id" => 2,
                "nombre" => "Ciencias Agrarias",
                "abrev" => "FCA"
            ],
            [
                "id" => 3,
                "nombre" => "Administración y Turismo",
                "abrev" => "FAT"
            ],
            [
                "id" => 4,
                "nombre" => "Ingeniería Industrial Alimentarias",
                "abrev" => "FIIA"
            ],
            [
                "id" => 5,
                "nombre" => "Ciencias del Ambiente",
                "abrev" => "FCAM"
            ],
            [
                "id" => 6,
                "nombre" => "Ingeniería de Minas, Geología y Metalurgia",
                "abrev" => "FIMGM"
            ],
            [
                "id" => 7,
                "nombre" => "Ingeniería Civil",
                "abrev" => "FIC"
            ],
            [
                "id" => 8,
                "nombre" => "Ciencias Médicas",
                "abrev" => "FCM"
            ],
            [
                "id" => 10,
                "nombre" => "Derecho y Ciencias Políticas",
                "abrev" => "FDCCPP"
            ],
            [
                "id" => 11,
                "nombre" => "Ciencias Sociales, Educación y de la Comunicación",
                "abrev" => "FCSEC"
            ],
            [
                "id" => 12,
                "nombre" => "Economía y Contabilidad",
                "abrev" => "FEC"
            ]
        ];

        Facultad::insert($data);
    }
}
