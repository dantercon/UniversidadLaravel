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
        Schema::create('detalle_record_academico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recor_academico_id');
            $table->unsignedBigInteger('materia_id');
            $table->string('periodo');
            $table->string('status');
            $table->timestamps();
            $table->foreign('recor_academico_id')->references('id')->on('recor_academico');
            $table->foreign('materia_id')->references('id')->on('materias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_record_academico');
    }
};
