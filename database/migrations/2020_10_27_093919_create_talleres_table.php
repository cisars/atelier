<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalleresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talleres', function (Blueprint $table) {
            $table->tinyInteger('taller',true)->unsigned();
            $table->smallInteger('localidad')->nullable();
            $table->string('descripcion','40')->nullable();
            $table->string('direccion','80')->nullable();
            $table->string('telefono','12')->nullable();

            $table->timestamps();

            $table->foreign('localidad')
                ->references('localidad')
                ->on('localidades');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talleres');
    }
}
