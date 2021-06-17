<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidasDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas_detalles', function (Blueprint $table) {

            $table->tinyInteger('item')->unsigned();
            $table->unsignedInteger('salida_id')->nullable();
            $table->unsignedTinyInteger('sector_id')->nullable();
            $table->unsignedSmallInteger('producto_id')->nullable();
            $table->float('cantidad',8,2)->nullable();

            $table->primary(['item','salida_id']);


            $table->foreign('salida_id')
                ->references('id')
                ->on('salidas')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE') ;

            $table->timestamps();
        });

     //   DB::statement('ALTER TABLE salidas_detalles MODIFY `item` TINYINT NOT NULL  ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salidas_detalles');
    }
}
