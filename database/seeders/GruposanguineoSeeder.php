<?php

namespace Database\Seeders;

use App\Models\Gruposanguineo;
use Illuminate\Database\Seeder;

class GruposanguineoSeeder extends Seeder
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
                "nombre" => "A"
            ],
            [
                "id" => 2,
                "nombre" => "B"
            ],
            [
                "id" => 3,
                "nombre" => "O"
            ],
            [
                "id" => 4,
                "nombre" => "AB"
            ]
        ];

        Gruposanguineo::insert($data);
    }
}
