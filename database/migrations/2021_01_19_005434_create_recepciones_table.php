<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecepcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepciones', function (Blueprint $table) {
            $table->increments('id' );
            $table->unsignedTinyInteger('taller_id')->nullable();
            $table->unsignedInteger('reserva_id')->nullable();
            //$table->unsignedInteger('cliente_id')->nullable();
            $table->smallInteger('cliente_id')->nullable();
            $table->smallInteger('vehiculo_id')->nullable();
            $table->timestamp('fecha_recepcion')->nullable();
            $table->string('usuario', 12)->nullable();

            $table->foreign('usuario')
                ->references('usuario')
                ->on('usuarios')
            ;
            $table->foreign('taller_id')
                ->references('id')
                ->on('talleres')
            ;
            $table->foreign('reserva_id')
                ->references('id')
                ->on('reservas')

            ;
            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
            ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recepciones');
    }
}
