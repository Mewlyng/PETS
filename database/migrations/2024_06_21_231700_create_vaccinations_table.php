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
        Schema::create('vaccinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pet_id'); // Foreign key
            $table->string('vaccine_name'); // Nombre de la vacuna
            $table->date('vaccination_date'); // Fecha de la vacunación
            $table->string('vet_name'); // Nombre del veterinario
            $table->text('notes')->nullable(); // Notas de la vacunación
            $table->timestamps();

            // Definir la clave foránea
            $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccinations');
    }
};
