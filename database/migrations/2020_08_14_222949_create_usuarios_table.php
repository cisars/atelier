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
            //$table->unsignedInteger('empleado_id')->nullable();
            $table->smallInteger('empleado_id')->nullable();
            $table->smallInteger('cliente_id')->nullable();
            //$table->unsignedInteger('cliente_id')->nullable();
            $table->string('clave')->nullable();
            $table->timestamp('fecha_ingreso')->nullable();
            $table->char('estado')->default('A');
            $table->string('observacion')->nullable();
            $table->char('perfil')->nullable();
            $table->char('tipo')->nullable();
            $table->string('email','200')->unique()->nullable();
            $table->timestamp('usuario_verified_at')->nullable();
            $table->string('mailtoken')->nullable();
            $table->rememberToken();
            $table->timestamps();

            // $table->primary(['usuario'  ]);
            $table->foreign('empleado_id')
                ->references('id')
                ->on('empleados');
            $table->foreign('cliente_id')
                ->references('id')
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
