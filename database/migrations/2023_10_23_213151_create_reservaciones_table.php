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
        Schema::create('reservaciones', function (Blueprint $table) {
            // Table Props
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';

            // Table Fields
            $table->integer('codReservacion', true);
            $table->integer('codCliente');
            $table->foreign('codCliente')->references('codUsuario')->on('usuarios');
            $table->date('fechaReservacion');
            $table->enum('estado', ['Pendiente', 'Canjeado']);
            $table->string('justificacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservaciones');
    }
};
