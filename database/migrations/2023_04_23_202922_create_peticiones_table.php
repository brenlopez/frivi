<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeticionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peticiones', function (Blueprint $table) {
            $table->id('peticion_id');
            $table->string('titulo', 100);
            $table->string('descripcion');
            $table->date('fecha_peticion');
            $table->decimal('monto_maximo', 6 , 2);
            $table->integer('tiempo_maximo');
            $table->string('aclaracion', 140)->nullable();
            $table->string('ubicacion');
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
        Schema::dropIfExists('peticiones');
    }
}
