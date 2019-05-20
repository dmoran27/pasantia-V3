<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaracteristicasPerifericosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristicas_perifericos', function (Blueprint $table) {
               $table->unsignedInteger('caracteristicas_id');
            $table->foreign('caracteristicas_id')->references('id')->on('caracteristicas');
             $table->unsignedInteger('perifericos_id');
            $table->foreign('perifericos_id')->references('id')->on('perifericos');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caracteristicas_perifericos');
    }
}
