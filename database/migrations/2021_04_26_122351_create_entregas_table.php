<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entregas', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('taller_id');
            $table->unsignedInteger('ot_id');
            $table->smallInteger('cliente_id')->nullable();
            $table->smallInteger('vehiculo_id')->nullable();
            $table->smallInteger('empleado_id')->nullable();
            $table->dateTime('fecha')->nullable();
            $table->string('observacion', 200)->nullable();
            $table->string('usuario', 12)->nullable();
            $table->timestamps();

            $table->foreign('taller_id')->references('id')->on('talleres');
            $table->foreign('ot_id')->references('id')->on('ordenes_trabajos');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->foreign('usuario')->references('usuario')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entregas');
    }
}
