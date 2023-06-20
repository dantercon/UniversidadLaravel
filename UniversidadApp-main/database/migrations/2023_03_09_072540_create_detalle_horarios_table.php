<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_horarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('horario_id');
            $table->unsignedBigInteger('materia_id');
            $table->unsignedBigInteger('profesor_id');
            $table->char('hora_fin');
            $table->char('hora_inicio');
            $table->timestamps();
            $table->foreign('horario_id')->references('id')->on('horarios');
            $table->foreign('materia_id')->references('id')->on('materias');
            $table->foreign('profesor_id')->references('id')->on('maestros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_horarios');
    }
};
