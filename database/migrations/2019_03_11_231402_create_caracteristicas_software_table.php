<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaracteristicasSoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristicas_software', function (Blueprint $table) {
              $table->unsignedInteger('caracteristicas_id');
            $table->foreign('caracteristicas_id')->references('id')->on('caracteristicas');
             $table->unsignedInteger('softwares_id');
            $table->foreign('softwares_id')->references('id')->on('softwares');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caracteristicas_software');
    }
}
