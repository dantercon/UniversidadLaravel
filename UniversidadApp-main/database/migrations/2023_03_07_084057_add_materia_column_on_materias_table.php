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
        Schema::table('materias', function (Blueprint $table) {
            $table->unsignedBigInteger('profesor_id')->after('id');
            $table->unsignedBigInteger('seccion_id')->after('profesor_id');
            $table->foreign('profesor_id')->references('id')->on('maestros');
            $table->foreign('seccion_id')->references('id')->on('secciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('materias', function (Blueprint $table) {
            $table->dropColumn('profesor_id');
            $table->dropColumn('seccion_id');
        });
    }
};
