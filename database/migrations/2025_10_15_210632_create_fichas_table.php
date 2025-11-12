<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fichas', function (Blueprint $table) {
            $table->integer('no_recibo')->primary();
            $table->date('fecha_pago')->nullable();
            $table->date('fecha_registro')->nullable();
            $table->string('instituto', 50)->nullable();
            $table->string('apellido_paterno',100)->nullable();
            $table->string('apellido_materno',100)->nullable();
            $table->string('nombre_aspirante',100)->nullable();
            $table->integer('nip');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('sexo',20)->nullable();
            $table->string('nacionalidad',50)->nullable();
            $table->string('especifique_extranjero',50)->nullable();
            $table->string('curp',18)->nullable();
            $table->string('carrera_opcion_1',50)->nullable();
            $table->string('carrera_opcion_2',50)->nullable();
            $table->string('entidad_federativa_prepa',50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichas');
    }
};
