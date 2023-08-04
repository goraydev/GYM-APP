<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
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
                "nombre" => "Amazonas"
            ],
            [
                "id" => 2,
                "nombre" => "Áncash"
            ],
            [
                "id" => 3,
                "nombre" => "Apurímac"
            ],
            [
                "id" => 4,
                "nombre" => "Arequipa"
            ],
            [
                "id" => 5,
                "nombre" => "Ayacucho"
            ],
            [
                "id" => 6,
                "nombre" => "Cajamarca"
            ],
            [
                "id" => 7,
                "nombre" => "Cusco"
            ],
            [
                "id" => 8,
                "nombre" => "Huancavelica"
            ],
            [
                "id" => 9,
                "nombre" => "Huánuco"
            ],
            [
                "id" => 10,
                "nombre" => "Ica"
            ],
            [
                "id" => 11,
                "nombre" => "Junín"
            ],
            [
                "id" => 12,
                "nombre" => "La Libertad"
            ],
            [
                "id" => 13,
                "nombre" => "Lambayeque"
            ],
            [
                "id" => 14,
                "nombre" => "Lima"
            ],
            [
                "id" => 15,
                "nombre" => "Loreto"
            ],
            [
                "id" => 16,
                "nombre" => "Madre de Dios"
            ],
            [
                "id" => 17,
                "nombre" => "Moquegua"
            ],
            [
                "id" => 18,
                "nombre" => "Pasco"
            ],
            [
                "id" => 19,
                "nombre" => "Piura"
            ],
            [
                "id" => 20,
                "nombre" => "Puno"
            ],
            [
                "id" => 21,
                "nombre" => "San Martín"
            ],
            [
                "id" => 22,
                "nombre" => "Tacna"
            ],
            [
                "id" => 23,
                "nombre" => "Tumbes"
            ],
            [
                "id" => 24,
                "nombre" => "Callao"
            ],
            [
                "id" => 25,
                "nombre" => "Ucayali"
            ]
        ];

        Departamento::insert($data);
    }
}
