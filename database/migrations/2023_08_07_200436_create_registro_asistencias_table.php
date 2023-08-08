<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_asistencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('control_id');
            $table->dateTime('fecha_hora_registro')->useCurrent();
            /* $table->timestamps(); */

            $table->foreign('user_id')->references('id')->on('pre_inscripcions')->onDelete('cascade');
            $table->foreign('control_id')->references('id')->on('controlasistencias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_asistencias');
    }
}
