<?php

namespace Database\Seeders;

use App\Models\registro_asistencia;
use Illuminate\Database\Seeder;

class RegistroAsistenciaSeeder extends Seeder
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
                "user_id" => 1,
                "control_id" => 1,
            ],
            [
                "id" => 2,
                "user_id" => 1,
                "control_id" => 2,
            ]
        ];
        registro_asistencia::insert($data);
    }
}
