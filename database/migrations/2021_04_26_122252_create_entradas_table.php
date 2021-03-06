<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradasTable extends Migration
{
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {

            $table->integer('id',true)->unsigned();

            $table->unsignedTinyInteger('taller_id')->nullable();
            $table->unsignedInteger('ot_id')->nullable();
            $table->string('numero_documento',12)->nullable();
            $table->unsignedSmallInteger('empleado_id')->nullable();
            $table->string('usuario')->nullable();

            $table->foreign('taller_id')
                ->references('id')
                ->on('talleres')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE') ;

            $table->foreign('ot_id')
                ->references('id')
                ->on('ordenes_trabajos')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE') ;

            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('entradas');
    }
}
