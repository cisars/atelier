<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateOrdenesTrabajosTable extends Migration
{
    public function up()
    {
        Schema::create('ordenes_trabajos', function (Blueprint $table) {

            $table->increments('id') ;
            $table->unsignedTinyInteger('taller_id')->nullable();
            $table->unsignedInteger('recepcion_id')->nullable();
            $table->smallInteger('cliente_id')->nullable();
            $table->smallInteger('vehiculo_id')->nullable();
            $table->smallInteger('empleado_id')->nullable();
            $table->unsignedTinyInteger('grupo_id')->nullable();
            $table->char('tipo',1)->nullable();
            $table->char('prioridad',1)->nullable();
            $table->char('estado',1)->nullable();
            $table->string('descripcion',200)->nullable();
            $table->float('importe_total',12,0)->nullable();
            $table->string('usuario')->nullable();

            $table->foreign('taller_id')
                ->references('id')
                ->on('talleres')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE') ;

            $table->foreign('recepcion_id')
                ->references('id')
                ->on('recepciones')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE') ;

            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE') ;

            $table->foreign('vehiculo_id')
                ->references('id')
                ->on('vehiculos')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE') ;

            $table->foreign('empleado_id')
                ->references('id')
                ->on('empleados')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE') ;

            $table->foreign('grupo_id')
                ->references('id')
                ->on('grupos')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE') ;

            $table->foreign('usuario')
                ->references('usuario')
                ->on('usuarios')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE') ;
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ordenes_trabajos');
    }
}
