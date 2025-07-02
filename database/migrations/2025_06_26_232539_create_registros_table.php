<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();

            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('curp', 18)->unique();
            $table->string('folio', 50)->nullable();
            $table->string('escuela', 150)->nullable();
            $table->string('cct', 20)->nullable(); // Clave de Centro de Trabajo
            $table->string('calificacion', 10)->nullable();
            $table->string('clave', 50)->nullable(); // Puede ser clave del documento o materia
            $table->string('secretaria', 150)->nullable();
            $table->date('fecha')->nullable();
            $table->string('imagen')->nullable(); // URL o path de la imagen

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registros');
    }
};
