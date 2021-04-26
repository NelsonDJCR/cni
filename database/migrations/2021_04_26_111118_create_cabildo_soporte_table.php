<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabildoSoporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabildo_soporte', function (Blueprint $table) {
            $table->id();
            $table->integer('id_cabildo')->nullable(); // debe ser foranea
            $table->integer('id_documento')->nullable(); // debe ser foranea de documento
            $table->boolean('estado')->default(1);
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
        Schema::dropIfExists('cabildo_soporte');
    }
}
