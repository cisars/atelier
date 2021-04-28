<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateOrdenesRepuestosTable extends Migration
{
    public function up()
    {
        Schema::create('ordenes_repuestos', function (Blueprint $table) {

            $table->unsignedInteger('ot_id')->nullable();
            $table->tinyInteger('item',false)->unsigned();
            $table->float('cantidad',8,2)->nullable();
            $table->unsignedSmallInteger('producto_id')->nullable();
            $table->unsignedTinyInteger('sector_id')->nullable();
            $table->string('usuario')->nullable();
            $table->string('observacion',200)->nullable();

            $table->foreign('ot_id')
                ->references('id')
                ->on('ordenes_trabajos')  ;
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ordenes_repuestos');
    }
}
