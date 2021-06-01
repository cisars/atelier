<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TalleresUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talleres_usuarios', function (Blueprint $table) {
            $table->tinyInteger('taller_id')->unsigned();
            $table->string('usuario')->nullable();
            $table->primary(['taller_id','usuario']);

            $table->timestamps();

            $table->foreign('taller_id')
                ->references('id')
                ->on('talleres');
            $table->foreign('usuario')
                ->references('usuario')
                ->on('usuarios');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
