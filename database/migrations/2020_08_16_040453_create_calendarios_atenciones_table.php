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
            $table->char('prioridad',1)->nullable();
            $table->char('estado',1)->nullable();
            $table->smallInteger('cliente_id')->nullable();
            //$table->foreign('usuario') ;
            $table->string('usuario', 255);

            $table->timestamps();

            //$table->primary(['calendario_atencion']);
            $table->foreign('usuario')
                ->references('usuario')
                ->on('usuarios')
                ->onDelete('cascade')
                ->onUpdate('cascade')
            ;

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
