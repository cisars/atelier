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
            $table->increments('reserva');
            $table->unsignedTinyInteger('taller')->nullable();
            $table->unsignedInteger('cliente')->nullable();
            $table->unsignedInteger('vehiculo')->nullable();
            $table->timestamp('fecha')->nullable();
            $table->timestamp('para_fecha')->nullable();
            $table->unsignedInteger('empleado')->nullable();
            $table->char('estado',1)->nullable();
            $table->char('forma_reserva',1)->nullable();
            $table->char('prioridad',1)->nullable();
            $table->string('observacion',200)->nullable();
            $table->string('usuario', 255);


            $table->foreign('taller')
                ->references('taller')
                ->on('talleres');
            $table->foreign('cliente')
                ->references('cliente')
                ->on('clientes');
            $table->foreign('vehiculo')
                ->references('vehiculo')
                ->on('vehiculos');
            $table->foreign('empleado')
                ->references('empleado')
                ->on('empleados');
            $table->foreign('usuario')
                ->references('usuario')
                ->on('usuarios');

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
