<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExistenciasManejosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('existencias_manejos');
        Schema::create('existencias_manejos', function (Blueprint $table) {
            $table->tinyInteger('sector_id')->unsigned();
            $table->smallInteger('producto_id')->unsigned();
//            $table->unsignedTinyInteger('sector_id');
//            $table->unsignedSmallInteger('producto_id');
            $table->float('cantidad',8,2)->nullable();

            $table->timestamps();

            $table->foreign('sector_id')
                ->references('id')
                ->on('sectores')
                ->onDelete('CASCADE')
            ;
            $table->foreign('producto_id')
                ->references('id')
                ->on('productos_servicios')
                ->onDelete('CASCADE')
            ;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('existencias_manejos');
    }
}
