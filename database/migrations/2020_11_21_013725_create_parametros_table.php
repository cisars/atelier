<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * Name	Code	Domain	Data Type	Primary	Foreign Key	Mandatory
    id	PARAMETRO_ID	d_tinyint	tinyint	TRUE	FALSE	TRUE
    cantidad prioridad alta	CANTIDAD_PRIORIDAD_ALTA	d_tinyint	tinyint	FALSE	FALSE	TRUE
    jefe mecanicos	JEFE_MECANICOS	d_smallint	smallint	FALSE	FALSE	TRUE
    periodicidad	PERIODICIDAD	d_tinyint	tinyint	FALSE	FALSE	TRUE
    horario inicial	HORARIO_INICIAL	d_time	time	FALSE	FALSE	TRUE
    horario final	HORARIO_FINAL	d_time	time	FALSE	FALSE	TRUE
    hora inicial sab	HORA_INICIAL_SAB	d_time	time	FALSE	FALSE	FALSE
    hora final sab	HORA_FINAL_SAB	d_time	time	FALSE	FALSE	FALSE
    activo	ACTIVO	d_bolean	bool	FALSE	FALSE	FALSE
     */
    public function up()
    {
        Schema::create('parametros', function (Blueprint $table) {
            $table->tinyInteger('id',true)->unsigned();
            $table->string('descripcion' )->nullable();
            $table->tinyInteger('cantidad_prioridad_alta' )->nullable();
            $table->smallInteger('jefe_mecanicos' )->nullable();
            $table->tinyInteger('periodicidad' )->nullable();
            $table->time('hora_apertura' )->nullable();
            $table->time('hora_cierre' )->nullable();
            $table->time('hora_apertura_sab' )->nullable();
            $table->time('hora_cierre_sab' )->nullable();
            $table->tinyInteger('sectores' )->nullable();
            $table->boolean('activo')->nullable();

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
        Schema::dropIfExists('parametros');
    }
}
