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
        Schema::table('alumnos', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');
            $table->unsignedBigInteger('seccion_id')->after('user_id');
            $table->unsignedBigInteger('recor_academico_id')->after('seccion_id');
            $table->unsignedBigInteger('carrera_id')->after('recor_academico_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('seccion_id')->references('id')->on('secciones');
            $table->foreign('recor_academico_id')->references('id')->on('recor_academico');
            $table->foreign('carrera_id')->references('id')->on('carreras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('seccion_id');
            $table->dropColumn('recor_academico_id');
            $table->dropColumn('carrera_id');
        });
    }
};
