<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('n_recibo', 12);
            $table->string('monto', 12);
            $table->boolean('estado')->default(1);
            $table->unsignedBigInteger('preinscripcion_id');
            $table->foreign('preinscripcion_id')->references('id')->on('pre_inscripcions');
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
        Schema::dropIfExists('inscripcions');
    }
}
