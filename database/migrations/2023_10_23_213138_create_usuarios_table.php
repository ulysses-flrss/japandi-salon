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
        Schema::create('usuarios', function (Blueprint $table) {
            // Table Props
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';

            // Table Fields
            $table->integer('codUsuario', true);
            $table->string('nombres');
            $table->string('apellidos');
            $table->integer('codRol');
            $table->foreign('codRol')->references('codRol')->on('roles');
            $table->string('telefono')->unique();
            $table->string('dui')->unique();
            $table->string('correo')->unique()->nullable();
            $table->string('password')->nullable();
            $table->integer('numReservaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
