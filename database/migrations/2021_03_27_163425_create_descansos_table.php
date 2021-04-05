<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescansosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descansos', function (Blueprint $table) {
            $table->tinyInteger('id',true)->unsigned();
            $table->unsignedTinyInteger('parametro_id')->nullable();
            $table->time('desde' )->nullable();
            $table->time('hasta' )->nullable();


            $table->foreign('parametro_id')
                ->references('id')
                ->on('parametros');
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
        Schema::dropIfExists('descansos');
    }
}
