<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('tipo');
            $table->integer('revista_id');
            $table->integer('edicion');
            $table->integer('vendedor_id');
            $table->integer('waypoint');
            $table->integer('lat');
            $table->integer('lang');
            $table->integer('localidad');
            $table->integer('distribuidora');
            $table->integer('linea');
            $table->integer('cantidad');

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
        Schema::drop('movimientos');
    }
}
