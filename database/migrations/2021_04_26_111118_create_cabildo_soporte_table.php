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
            $table->foreignId('id_cabildo')->nullable()->constrained('cabildo_abierto')->onDelete('restrict');
            $table->foreignId('id_documento')->nullable()->constrained('documento')->onDelete('restrict');
            $table->integer('estado')->default(1); // 0: inactivo, 1: activo, 2: pendiente, //3 Eliminado
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
