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
            $table->string('mode'); //Si es a domicilio o pasan por el a tienda
            $table->boolean('done'); //Si ya se hizo y recogió/llevó el pedido
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
