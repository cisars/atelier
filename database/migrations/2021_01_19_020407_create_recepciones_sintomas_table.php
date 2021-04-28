<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecepcionesSintomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepciones_sintomas', function (Blueprint $table) {
            $table->integer('recepcion_id')->unsigned();
            $table->smallInteger('sintoma_id')->nullable();


            $table->foreign('recepcion_id')
                ->references('id')
                ->on('recepciones')
                ->onDelete('cascade');;
            $table->foreign('sintoma_id')
                ->references('id')
                ->on('sintomas')
                ->onDelete('cascade')
            ;

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
        Schema::dropIfExists('recepciones_sintomas');
    }
}
