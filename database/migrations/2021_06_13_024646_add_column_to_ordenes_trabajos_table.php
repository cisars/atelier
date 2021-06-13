<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToOrdenesTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordenes_trabajos', function (Blueprint $table) {
            $table->unsignedTinyInteger('sector_id')->nullable();
            $table->foreign('sector_id')->references('id')->on('sectores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordenes_trabajos', function (Blueprint $table) {
            //
        });
    }
}
