<?php

namespace Database\Seeders;

use App\Models\Horario;
use Illuminate\Database\Seeder;

class HorarioSeeder extends Seeder
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
                'inicio' => '09:00:00',
                'fin' => '10:00:00',
            ],
            [
                "id" => 2,
                'inicio' => '10:00:00',
                'fin' => '11:00:00',
            ],
            [
                "id" => 3,
                'inicio' => '11:00:00',
                'fin' => '12:00:00',
            ],
            [
                "id" => 4,
                'inicio' => '15:00:00',
                'fin' => '16:00:00',
            ],
            [
                "id" => 5,
                'inicio' => '16:00:00',
                'fin' => '17:00:00',
            ],
            [
                "id" => 6,
                'inicio' => '17:00:00',
                'fin' => '18:00:00',
            ],
            [
                "id" => 7,
                'inicio' => '18:00:00',
                'fin' => '19:00:00',
            ]
        ];

        Horario::insert($data);
    }
}
