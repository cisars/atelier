<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateFeriadosTable extends Migration
{
    public function up()
    {
        Schema::create('feriados', function (Blueprint $table) {

            $table->smallInteger('id',true)->unsigned();;
            $table->tinyInteger('dia')->nullable();
            $table->tinyInteger('mes')->nullable();
            $table->string('descripcion',40)->nullable();
            $table->char('estado',1)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('feriados');
    }
}

