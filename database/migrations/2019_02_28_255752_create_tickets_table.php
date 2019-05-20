<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('identificador');
            $table->enum('estado',['Asignado','Abierto','Cerrado','En espera']);
            $table->enum('accion',['Solventado','Revisado','Sin Solucion']);
            $table->enum('prioridad',['Alta','Media','Baja']);
            $table->text('observacion')->nullable();
            $table->string('tiempo_i');
            $table->string('tiempo_c');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('cliente_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->softDeletes(); //Nueva línea, para el borrado lógico
            $table->timestamps();
             $table->index(['deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
