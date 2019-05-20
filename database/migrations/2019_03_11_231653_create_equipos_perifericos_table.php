<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquiposPerifericosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos_perifericos', function (Blueprint $table) {
               $table->unsignedInteger('equipos_id');
            $table->foreign('equipos_id')->references('id')->on('equipos');
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
        Schema::dropIfExists('equipos_perifericos');
    }
}
