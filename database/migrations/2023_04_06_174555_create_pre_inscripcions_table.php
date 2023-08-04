<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreInscripcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_inscripcions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dni', 8);
            $table->string('nombres', 250);
            $table->string('apellidos', 250);
            $table->date('f_nacimiento')->nullable();
            $table->string('edad', 3)->nullable();
            $table->string('celular', 9)->nullable();
            $table->string('domicilio', 250)->nullable();
            $table->string('oficina', 250)->nullable();
            $table->string('correo', 250)->nullable();
            $table->string('peso', 250)->nullable();
            $table->string('talla', 250)->nullable();
            $table->string('imc', 250)->nullable();
            $table->boolean('activo')->default(1);
            $table->unsignedBigInteger('genero_id');
            $table -> foreign('genero_id')->references('id')->on('generos'); 

            $table->unsignedBigInteger('distrito_id');
            $table -> foreign('distrito_id')->references('id')->on('distritos');

            $table->unsignedBigInteger('semestre_id')->nullable()->unsigned();
            $table -> foreign('semestre_id')->references('id')->on('semestres');
          
            $table->unsignedBigInteger('escuela_id')->nullable()->unsigned();
            $table -> foreign('escuela_id')->references('id')->on('escuelas');

            $table->unsignedBigInteger('gruposanguineo_id');
            $table -> foreign('gruposanguineo_id')->references('id')->on('gruposanguineos');
            
            $table->unsignedBigInteger('factorRh_id');
            $table -> foreign('factorRh_id')->references('id')->on('factor_rhs');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_inscripcions');
    }
}
