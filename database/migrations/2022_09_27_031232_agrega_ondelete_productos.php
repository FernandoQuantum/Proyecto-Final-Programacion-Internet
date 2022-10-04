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
        Schema::table('cliente_producto', function (Blueprint $table) {
            $table->dropForeign('cliente_producto_producto_id_foreign');
            $table->foreign('producto_id')
            ->references('id')->on('productos')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cliente_producto', function (Blueprint $table) {
            $table->dropForeign('cliente_producto_producto_id_foreign');
            $table->foreign('producto_id')
            ->references('id')->on('productos');
        });
    }
};
