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
        Schema::create('proprietarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->string('cpf', 14)->unique();
            $table->string('email', 255)->unique();
            $table->string('telefone', 20);
            $table->string('celular', 20)->nullable();
            $table->date('data_nasc');
            $table->enum('genero', ['Masculino', 'Feminino', 'Outro']);
            $table->string('endereco', 255);
            $table->string('bairro', 255);
            $table->string('numero', 10);
            $table->string('complemento', 100)->nullable();
            $table->string('cep', 10);
            $table->string('cidade', 100);
            $table->string('estado', 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proprietarios');
    }
};
