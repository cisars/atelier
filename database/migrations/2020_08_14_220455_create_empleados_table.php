<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('empleado');
            $table->string('nombres',40)->nullable();
            $table->string('apellidos',40)->nullable();
            $table->float('ci',12,0)->nullable();
            $table->char('estado_civil')->nullable();
            $table->char('sexo')->nullable();
            $table->string('direccion',80)->nullable();
            $table->smallInteger('localidad')->nullable();
            $table->string('movil',20)->nullable();
            $table->string('telefono',20)->nullable();
            $table->tinyInteger('cargo')->nullable();
            $table->tinyInteger('turno_empleado')->nullable();
            $table->tinyInteger('grupo_trabajo')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->timestamp('fecha_ingreso')->nullable();
            $table->char('estado')->nullable();
            $table->timestamp('fecha_egreso')->nullable();
            $table->string('motivo_egreso',200)->nullable();
            $table->float('salario',12,0)->nullable();

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
        Schema::dropIfExists('empleados');
    }
}


