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
        Schema::table('sedes', function (Blueprint $table) {
            $table->unsignedBigInteger('ciudad');
            $table->unsignedBigInteger('telefono');
            $table->unsignedBigInteger('email')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sedes', function (Blueprint $table) {
            $table->dropColumn('ciudad');
            $table->dropColumn('telefono');
            $table->dropColumn('email');
        });
    }
};
