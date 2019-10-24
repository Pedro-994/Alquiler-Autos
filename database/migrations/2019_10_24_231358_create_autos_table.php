<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->bigIncrements('idauto');
            $table->string('matricula')->unique();
            $table->string('modelo');
            $table->string('color');
            $table->decimal('kilometraje');
            $table->string('seguro');
            $table->string('situacion');
            $table->biginteger('idmarca')->unsigned();
            $table->foreign('idmarca')->references('idmarca')->on('marcas');
            $table->biginteger('idaseguradora')->unsigned();
            $table->foreign('idaseguradora')->references('idaseguradora')->on('aseguradoras');
            $table->biginteger('idcategoria')->unsigned();
            $table->foreign('idcategoria')->references('idcategoria')->on('categorias');
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
        Schema::dropIfExists('autos');
    }
}