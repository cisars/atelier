<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('taller_id')->nullable();
            //$table->unsignedInteger('cliente_id')->nullable();
            $table->smallInteger('cliente_id')->nullable();
            //$table->unsignedInteger('vehiculo_id')->nullable();
            $table->smallInteger('vehiculo_id')->nullable();
            $table->date('fecha')->nullable();
            $table->date('para_fecha')->nullable();
            //$table->unsignedInteger('empleado_id')->nullable();
            $table->smallInteger('empleado_id')->nullable();
            $table->char('estado',1)->nullable();
            $table->char('forma_reserva',1)->nullable();
            $table->char('prioridad',1)->nullable();
            $table->string('observacion',200)->nullable();
            $table->string('usuario', 255);
            $table->time('para_hora');
            $table->tinyInteger('turno');
            $table->tinyInteger('sector');
            $table->tinyInteger('ticket');
            $table->unsignedTinyInteger('parametro_id')->nullable();


            $table->foreign('taller_id')
                ->references('id')
                ->on('talleres');
            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes');
            $table->foreign('vehiculo_id')
                ->references('id')
                ->on('vehiculos');
            $table->foreign('empleado_id')
                ->references('id')
                ->on('empleados');
            $table->foreign('usuario')
                ->references('usuario')
                ->on('usuarios');
            $table->foreign('parametro_id')
                ->references('id')
                ->on('parametros');

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
        Schema::dropIfExists('reservas');
    }
}
