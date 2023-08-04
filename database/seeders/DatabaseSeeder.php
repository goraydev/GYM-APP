<?php

namespace Database\Seeders;

use App\Models\Criterio;
use App\Models\Opcion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            DepartamentoSeeder::class,
            ProvinciaSeeder::class,
            DistritoSeeder::class,
            GeneroSeeder::class,
            FacultadSeeder::class,
            EscuelaSeeder::class,
            GruposanguineoSeeder::class,
            FactorRhSeeder::class,
            SemestreSeeder::class,
            CriterioSeeder::class,
            OpcionSeeder::class,
            DiaSeeder::class,
            HorarioSeeder::class,
            ClaseSeeder::class,
            PreinscripcionSeeder::class,

        ]);
    }
}
