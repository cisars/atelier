<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateEntradasDetallesTable extends Migration
{
    public function up()
    {
        Schema::create('entradas_detalles', function (Blueprint $table) {

            $table->tinyInteger('item')->unsigned();
            $table->unsignedInteger('entrada_id')->nullable();
            $table->unsignedTinyInteger('sector_id')->nullable();
            $table->unsignedSmallInteger('producto_id')->nullable();
            $table->float('cantidad',8,2)->nullable();

            $table->foreign('entrada_id')
                ->references('id')
                ->on('entradas')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE') ;

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('entradas_detalles');
    }
}