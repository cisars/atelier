<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectores', function (Blueprint $table) {
            $table->tinyInteger('id',true)->unsigned();
            /*$table->unsignedTinyInteger('sucursal_id')->nullable();*/
            $table->unsignedTinyInteger('taller_id')->nullable();
            $table->string('descripcion','80')->nullable();

            $table->foreign('taller_id')
                ->references('id')
                ->on('talleres');

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
        Schema::dropIfExists('sectores');
    }
}
