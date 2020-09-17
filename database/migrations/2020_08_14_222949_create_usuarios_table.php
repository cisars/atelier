<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {

            $table->string('usuario', 255)->primary();
            $table->unsignedInteger('empleado')->nullable();
            $table->string('cliente')->nullable();
            $table->string('clave')->nullable();
            $table->timestamp('fecha_ingreso')->nullable();
            $table->char('estado')->default('A');
            $table->string('observacion')->nullable();
            $table->char('perfil')->nullable();
            $table->char('tipo')->default('A');
            $table->timestamps();

            // $table->primary(['usuario'  ]);
            $table->foreign('empleado')
                ->references('empleado')
                ->on('empleados');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
