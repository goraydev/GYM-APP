<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaCriteriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_criterios', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->id();

            $table->unsignedBigInteger('criterio_id');
            $table -> foreign('criterio_id')->references('id')->on('criterios');
            // $table->foreignId('criterio_id')->constrained('criterios'); 

            $table->unsignedBigInteger('opcion_id');
            $table -> foreign('opcion_id')->references('id')->on('opcions'); 

            $table->unsignedBigInteger('preinscripcion_id');
            $table -> foreign('preinscripcion_id')->references('id')->on('pre_inscripcions');
            $table->string('comentario', 250)->nullable();
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
        Schema::dropIfExists('persona_criterios');
    }
}
