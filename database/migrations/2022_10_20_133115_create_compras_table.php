<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users'); //Para tener acceso a los datos del usuario
            $table->float('total'); //Precio del producto más cargos en caso de a domicilio
            $table->string('prod_name');
            $table->boolean('mode'); //0 es tienda 1 es a domicilio
            $table->string('status'); //pendiente, hecho y entregado (o sea si el cliente ya lo recibió)
            $table->integer('amount'); //Cuantas unidades de este producto se compraron
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
        Schema::dropIfExists('compras');
    }
};
