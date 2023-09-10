<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialesTable extends Migration
{
    public function up()
    {
        Schema::create('historiales', function (Blueprint $table) {
            $table->id();
            $table->string('cantidad', 100);
            $table->unsignedBigInteger('bodega_origen_id');
            $table->unsignedBigInteger('bodega_destino_id');
            $table->unsignedBigInteger('inventario_id');
            $table->timestamps();

            $table->foreign('bodega_origen_id')->references('id')->on('bodegas')->onDelete('cascade');
            $table->foreign('bodega_destino_id')->references('id')->on('bodegas')->onDelete('cascade');
            $table->foreign('inventario_id')->references('id')->on('inventarios')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('historiales');
    }
}
