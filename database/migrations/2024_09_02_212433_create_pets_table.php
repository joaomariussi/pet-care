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
            $table->foreignId('id_proprietario')->constrained('proprietarios')->onDelete('cascade');
            $table->string('nome', 255);
            $table->date('data_nascimento');
            $table->string('especie', 255);
            $table->string('raca', 255);
            $table->string('genero', 50);
            $table->string('cor', 255);
            $table->double('peso', 5, 2);
            $table->text('historico_medico')->nullable();
            $table->string('foto', 255)->nullable();
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
