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
            //$table->increments('id' );
            $table->smallInteger('id',true);
            $table->string('nombres',40)->nullable();
            $table->string('apellidos',40)->nullable();
            $table->float('ci',12,0)->nullable();
            $table->char('estado_civil')->nullable();
            $table->char('sexo')->nullable();
            $table->string('direccion',80)->nullable();
            $table->smallInteger('localidad_id')->nullable();
            $table->string('movil',20)->nullable();
            $table->string('telefono',20)->nullable();
            $table->unsignedTinyInteger('cargo_id')->nullable();
            $table->smallInteger('turno_id')->nullable();
            $table->unsignedTinyInteger('grupo_id')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->timestamp('fecha_ingreso')->nullable();
            $table->char('estado')->nullable();
            $table->timestamp('fecha_egreso')->nullable();
            $table->string('motivo_egreso',200)->nullable();
            $table->float('salario',12,0)->nullable();

            $table->foreign('localidad_id')
                ->references('id')
                ->on('localidades');
            $table->foreign('cargo_id')
                ->references('id')
                ->on('cargos')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE')
            ;
            $table->foreign('turno_id')
                ->references('id')
                ->on('turnos');
            $table->foreign('grupo_id')
                ->references('id')
                ->on('grupos');

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


