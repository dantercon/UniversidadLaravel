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
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detalle_recor_academico_id');
            $table->string('name');
            $table->string('tipo');
            $table->string('porcentaje');
            $table->string('materiales');
            $table->timestamps();
            $table->foreign('detalle_recor_academico_id')->references('id')->on('detalle_record_academico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluaciones');
    }
};
