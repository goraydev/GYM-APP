<?php

namespace Database\Seeders;

use App\Models\Clase;
use Illuminate\Database\Seeder;

class ClaseSeeder extends Seeder
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
                "nombre" => "BAILE"
            ],
            [
                "id" => 2,
                "nombre" => "AERÓBICOS"
            ]
        ];

        Clase::insert($data);
    }
}
