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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('owners')->onDelete('cascade');
            $table->string('name', 255);
            $table->date('date_birth');
            $table->enum('species', ['Cachorro', 'Gato', 'Pássaro', 'Roedor', 'Réptil', 'Outro']);
            $table->string('race')->nullable()->default('Sem raça');
            $table->enum('gender', ['Macho', 'Fêmea']);
            $table->string('color', 255);
            $table->double('weight', 13, 3);
            $table->string('photo', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
