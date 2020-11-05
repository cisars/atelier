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
            $table->unsignedInteger('cliente')->nullable();
            $table->string('clave')->nullable();
            $table->timestamp('fecha_ingreso')->nullable();
            $table->char('estado')->default('1');
            $table->string('observacion')->nullable();
            $table->char('perfil')->nullable();
            $table->char('tipo')->nullable();
            $table->timestamp('usuario_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            // $table->primary(['usuario'  ]);
            $table->foreign('empleado')
                ->references('empleado')
                ->on('empleados');
            $table->foreign('cliente')
                ->references('cliente')
                ->on('clientes');
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
