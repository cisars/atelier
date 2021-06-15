<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosMaquinasTable extends Migration
{
    public function up()
    {
        Schema::create('empleados_maquinas', function (Blueprint $table) {


            $table->smallInteger('empleado_id')->nullable();
            $table->unsignedTinyInteger('maquinaria_id')->nullable();
            $table->string('observacion',200)->nullable();

            $table->foreign('empleado_id')
                ->references('id')
                ->on('empleados')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE') ;

            $table->foreign('maquinaria_id')
                ->references('id')
                ->on('maquinarias')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE') ;

            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('empleados_maquinas');
    }
}
