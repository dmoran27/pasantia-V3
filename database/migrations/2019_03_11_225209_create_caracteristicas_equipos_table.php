<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaracteristicasEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristicas_equipos', function (Blueprint $table) {
               $table->unsignedInteger('equipos_id');
            $table->foreign('equipos_id')->references('id')->on('equipos');
             $table->unsignedInteger('caracteristicas_id');
            $table->foreign('caracteristicas_id')->references('id')->on('caracteristicas');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caracteristicas_equipos');
    }
}
