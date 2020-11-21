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
            $table->increments('vehiculo');
            $table->unsignedInteger('cliente')->nullable();
            $table->unsignedTinyInteger('modelo')->nullable();
            $table->string('chapa',12)->nullable();
            $table->string('chasis',12)->nullable();
            $table->unsignedTinyInteger('color')->nullable();
            $table->char('combustion')->nullable();
            $table->char('tipo')->nullable();
            $table->smallInteger('año')->nullable();

            $table->foreign('cliente')
                ->references('cliente')
                ->on('clientes');
            $table->foreign('modelo')
                ->references('modelo')
                ->on('modelos');
            $table->foreign('color')
                ->references('color')
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
