<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('cliente') ;
            $table->string('razon_social',40)->nullable();
            $table->string('documento',12)->nullable();
            $table->string('direccion',80)->nullable();
            $table->smallInteger('localidad')->nullable();
            $table->string('telefono',20)->nullable();
            $table->string('movil',20)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->char('personeria',1)->nullable();

            $table->foreign('localidad')
                ->references('localidad')
                ->on('localidades');

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
        Schema::dropIfExists('clientes');
    }
}
