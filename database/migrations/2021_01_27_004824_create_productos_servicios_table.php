<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateProductosServiciosTable extends Migration
{
    public function up()
    {
        Schema::create('productos_servicios', function (Blueprint $table) {

            $table->smallInteger('id',true)->unsigned();
            $table->string('codigo',15)->nullable();
            $table->string('descripcion',80)->nullable();
            $table->unsignedTinyInteger('clasificacion_id')->nullable();
            $table->unsignedTinyInteger('unidad_id')->nullable();
            $table->tinyInteger('impuesto')->nullable();
            $table->float('precio_venta',12.0)->nullable();

            $table->foreign('clasificacion_id')
                ->references('id')
                ->on('clasificaciones')  ;

            $table->foreign('unidad_id')
                ->references('id')
                ->on('unidades')  ;

        });
    }

    public function down()
    {
        Schema::dropIfExists('productos_servicios');
    }
}
