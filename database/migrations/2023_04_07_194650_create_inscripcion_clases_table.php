<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcion_clases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('dia_id');
            $table->unsignedBigInteger('turno_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('pre_inscripcions')->onDelete('cascade');
            $table->foreign('dia_id')->references('id')->on('dias')->onDelete('cascade');
            $table->foreign('turno_id')->references('id')->on('horarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscripcion_clases');
    }
}
