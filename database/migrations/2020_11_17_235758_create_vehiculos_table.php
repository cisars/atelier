<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            //$table->increments('id');
            $table->smallInteger('id',true);
            $table->smallInteger('cliente_id')->nullable();
          //  $table->unsignedInteger('cliente_id')->nullable();
            $table->unsignedTinyInteger('modelo_id')->nullable();
            $table->string('chapa',12)->nullable();
            $table->string('chasis',12)->nullable();
            $table->unsignedTinyInteger('color_id')->nullable();
            $table->char('combustion')->nullable();
            $table->char('tipo')->nullable();
            $table->smallInteger('año')->nullable();

            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes');
            $table->foreign('modelo_id')
                ->references('id')
                ->on('modelos');
            $table->foreign('color_id')
                ->references('id')
                ->on('colores');

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
        Schema::dropIfExists('vehiculos');
    }
}
