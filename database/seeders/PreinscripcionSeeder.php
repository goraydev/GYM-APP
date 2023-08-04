<?php

namespace Database\Seeders;

use App\Models\pre_inscripcion;
use Illuminate\Database\Seeder;

class PreinscripcionSeeder extends Seeder
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
                "dni" => "47779608",
                "nombres" => "Olfredo Dayvid",
                "apellidos" => "Pachas Quenhua",
                "f_nacimiento" => "2022-03-03",
                "edad" => "18",
                "genero_id" => "1",
                "distrito_id" => "1",
                "semestre_id" => "1",
                "escuela_id" => "1",
                "gruposanguineo_id" => "1",
                "factorRh_id" => "1"
            ]
        ];

        pre_inscripcion::insert($data);
    }
}
