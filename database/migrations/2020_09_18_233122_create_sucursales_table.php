<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursales', function (Blueprint $table) {
            $table->tinyInteger('sucursal',true)->unsigned();
            $table->string('descripcion','40')->nullable();
            $table->string('direccion','40')->nullable();
            $table->smallInteger('localidad')->nullable();
            $table->string('telefono','15')->nullable();
            $table->string('email','80')->nullable();

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
        Schema::dropIfExists('sucursales');
    }
}
