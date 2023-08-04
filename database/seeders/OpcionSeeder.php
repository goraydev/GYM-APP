<?php

namespace Database\Seeders;

use App\Models\Opcion;
use Illuminate\Database\Seeder;

class OpcionSeeder extends Seeder
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
                "nombre" => "Si"
            ],
            [
                "id" => 2,
                "nombre" => "No"
            ],
            [
                "id" => 3,
                "nombre" => "No Sabe"
            ]

        ];

        Opcion::insert($data);   
    }
}
