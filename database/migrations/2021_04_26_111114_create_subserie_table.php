<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSerieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subserie', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_serie')->nullable()->constrained('serie')->onDelete('restrict');
            $table->string('num_subserie')->nullable();
            $table->string('nombre')->nullable();
            $table->integer('estado')->default(1); // 0: inactivo, 1: activo, 2: pendiente
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
        Schema::dropIfExists('subserie');
    }
}
