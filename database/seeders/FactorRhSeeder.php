<?php

namespace Database\Seeders;

use App\Models\FactorRh;
use Illuminate\Database\Seeder;

class FactorRhSeeder extends Seeder
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
                "nombre" => "Positivo"
            ],
            [
                "id" => 2,
                "nombre" => "Negativo"
            ]
        ];

        FactorRh::insert($data);
    }
}
