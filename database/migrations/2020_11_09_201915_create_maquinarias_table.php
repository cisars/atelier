<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaquinariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquinarias', function (Blueprint $table) {
            $table->tinyInteger('maquinaria',true);
            $table->unsignedTinyInteger('maquinaria_tipo')->nullable();
            $table->string('descripcion','80')->nullable();
            $table->char('estado',1)->nullable();

            $table->foreign('maquinaria_tipo')
                ->references('maquinaria_tipo')
                ->on('maquinarias_tipos');

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
        Schema::dropIfExists('maquinarias');
    }
}
