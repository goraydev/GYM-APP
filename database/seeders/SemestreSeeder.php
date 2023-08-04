<?php

namespace Database\Seeders;

use App\Models\Semestre;
use Illuminate\Database\Seeder;

class SemestreSeeder extends Seeder
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
                "semestre" => "2022-II"
            ],
            [
                "id" => 2,
                "semestre" => "2023-I"
            ],
            [
                "id" => 3,
                "semestre" => "2023-II"
            ],
            [
                "id" => 4,
                "semestre" => "2024-I"
            ]
        ];

        Semestre::insert($data);
    }
}
