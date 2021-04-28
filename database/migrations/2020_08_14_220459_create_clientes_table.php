<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->smallInteger('id',true);
          //  $table->increments('id') ;
            $table->string('razon_social',40)->nullable();
            $table->string('documento',12)->nullable();
            $table->string('direccion',80)->nullable();
            $table->smallInteger('localidad_id')->nullable();
            $table->string('email',80)->nullable();
            $table->string('telefono',20)->nullable();
            $table->string('movil',20)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->char('personeria',1)->nullable();

            $table->foreign('localidad_id')
                ->references('id')
                ->on('localidades');

            $table->timestamps();
        });
        DB::statement(
            'ALTER TABLE clientes ADD FULLTEXT fulltext_index(razon_social, documento, email)'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
