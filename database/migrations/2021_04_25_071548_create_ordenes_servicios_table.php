<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateOrdenesServiciosTable extends Migration
{
    public function up()
    {
        Schema::create('ordenes_servicios', function (Blueprint $table) {

            $table->tinyInteger('id',true)->unsigned();
            $table->unsignedInteger('ot_id')->nullable();
            $table->unsignedSmallInteger('servicio_id')->nullable();
            $table->float('cantidad',8,2)->nullable();
            $table->string('descripcion',200)->nullable();
            $table->char('realizado',1)->nullable();
            $table->char('verificado',1)->nullable();
            $table->string('usuario')->nullable();
            $table->string('descripcion_verificacion',200)->nullable();

            $table->foreign('ot_id')
                ->references('id')
                ->on('ordenes_trabajos')  ;

            $table->foreign('servicio_id')
                ->references('id')
                ->on('productos_servicios') ;
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ordenes_servicios');
    }
}

