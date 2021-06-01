<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesServiciosTable extends Migration
{
    public function up()
    {
        Schema::create('ordenes_servicios', function (Blueprint $table) {

            $table->unsignedTinyInteger('id'  );
            $table->unsignedInteger('ot_id')->nullable();

            $table->unsignedSmallInteger('servicio_id')->nullable();
            $table->float('cantidad',8,2)->nullable();
            $table->string('descripcion',200)->nullable();
            $table->char('realizado',1)->nullable();
            $table->char('verificado',1)->nullable();
            $table->string('usuario')->nullable();
            $table->string('descripcion_verificacion',200)->nullable();
            $table->primary(['id','ot_id']);

            $table->foreign('ot_id')
                ->references('id')
                ->on('ordenes_trabajos')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE') ;

            $table->foreign('servicio_id')
                ->references('id')
                ->on('productos_servicios')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE') ;

            $table->timestamps();


        });

        DB::statement('ALTER TABLE ordenes_servicios MODIFY id TINYINT NOT NULL AUTO_INCREMENT');

//        Schema::table('ordenes_servicios', function (Blueprint $table) {
//
//            $table->tinyInteger('id', true,true )->change();
//        });
    }

    public function down()
    {
        Schema::dropIfExists('ordenes_servicios');
    }
}


