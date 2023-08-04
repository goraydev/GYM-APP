<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
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
                "nombre" => "Masculino"
            ],
            [
                "id" => 2,
                "nombre" => "Femenino"
            ]
        ];

        Genero::insert($data);
    }
}
