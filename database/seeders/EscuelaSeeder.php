<?php

namespace Database\Seeders;

use App\Models\Escuela;
use Illuminate\Database\Seeder;

class EscuelaSeeder extends Seeder
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
                "nombre" => "Agronomía",
                "facultad_id" => 2
            ],
            [
                "id" => 2,
                "nombre" => "Ingeniería de Industrias Alimentarias",
                 "facultad_id" => 4
            ],
            [
                "id" => 3,
                "nombre" => "Ingeniería Agrícola",
                "facultad_id" => 2
            ],
            [
                "id" => 4,
                "nombre" => "Estadística e Informática",
                "facultad_id" => 1
            ],
            [
                "id" => 5,
                "nombre" => "Matemática",
                "facultad_id" => 1
            ],
            [
                "id" => 6,
                "nombre" => "Ingeniería Ambiental",
                 "facultad_id" => 5
            ],
            [
                "id" => 7,
                "nombre" => "Ingeniería Sanitaria",
                 "facultad_id" => 5
            ],
            [
                "id" => 8,
                "nombre" => "Ingeniería de Minas",
                 "facultad_id" => 6
            ],
            [
                "id" => 9,
                "nombre" => "Ingeniería Civil",
                 "facultad_id" => 7
            ],
            [
                "id" => 10,
                "nombre" => "Obstetricia",
                 "facultad_id" => 8
            ],
            [
                "id" => 11,
                "nombre" => "Enfermería",
                 "facultad_id" => 8
            ],
            [
                "id" => 12,
                "nombre" => "Economía",
                 "facultad_id" => 12
            ],
            [
                "id" => 13,
                "nombre" => "Administración",
                "facultad_id" => 3
            ],
            [
                "id" => 14,
                "nombre" => "Contabilidad",
                 "facultad_id" => 12
            ],
            [
                "id" => 15,
                "nombre" => "Turismo",
                "facultad_id" => 3
            ],
            [
                "id" => 16,
                "nombre" => "Derecho y Ciencias Políticas",
                 "facultad_id" => 10
            ],
            [
                "id" => 19,
                "nombre" => "Primaria y Educación Bilingüe Intercultural",
                 "facultad_id" => 11
            ],
            [
                "id" => 21,
                "nombre" => "Matemática e Informática",
                 "facultad_id" => 11
            ],
            [
                "id" => 24,
                "nombre" => "Ciencias de la Comunicación",
                "facultad_id" => 11
            ],
            [
                "id" => 25,
                "nombre" => "Ingeniería de Sistemas e Informática",
                "facultad_id" => 1
            ],
            [
                "id" => 28,
                "nombre" => "Comunicación, Lingüística y Literatura",
                 "facultad_id" => 11
            ],
            [
                "id" => 29,
                "nombre" => "Lengua Extranjera: Inglés",
                 "facultad_id" => 11
            ],
            [
                "id" => 34,
                "nombre" => "Arqueología",
                "facultad_id" => 11
            ],
            [
                "id" => 35,
                "nombre" => "Ingeniería Industrial",
                 "facultad_id" => 4
            ],
            [
                "id" => 36,
                "nombre" => "Arquitectura y Urbanismo",
                 "facultad_id" => 7
            ]
        ];

        Escuela::insert($data);
    }
}
