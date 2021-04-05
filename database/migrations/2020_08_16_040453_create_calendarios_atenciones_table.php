<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendariosAtencionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendarios_atenciones', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha')->nullable();
            $table->smallInteger('turno_recepcion',false,true )->nullable();
            $table->time('hora_desde')->nullable();
            $table->time('hora_hasta')->nullable();
            $table->char('estado',1)->nullable();
            $table->string('usuario',15)->nullable();
            $table->timestamp('fecha_registro')->nullable();
            $table->tinyInteger('periodicidad')->nullable();
            $table->time('desde',1)->nullable();
            $table->time('hasta',1)->nullable();
            $table->smallInteger('sector')->nullable();

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
        Schema::dropIfExists('calendarios_atenciones');
    }
}
