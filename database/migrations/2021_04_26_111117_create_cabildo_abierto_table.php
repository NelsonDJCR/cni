<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabildoAbiertoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabildo_abierto', function (Blueprint $table) {
            $table->id();
            $table->integer('id_departamento')->nullable(); // debe ser foranea de depa
            $table->integer('id_municipio')->nullable(); // debe ser foranea de muni
            $table->string('radicado_CNE')->nullable();
            $table->string('nombre_tema',100)->nullable();
            $table->string('description')->nullable();
            $table->date('fecha_realizacion')->nullable();
            $table->string('estado',50)->nullable();
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
        Schema::dropIfExists('cabildo_abierto');
    }
}
