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
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('cpf', 14)->unique();
            $table->string('email', 255)->unique();
            $table->string('telephone', 20);
            $table->string('cell_phone', 20)->nullable();
            $table->date('date_birth');
            $table->enum('gender', ['Masculino', 'Feminino', 'Outro']);
            $table->string('address', 255);
            $table->string('neighborhood', 255);
            $table->string('number', 10)->nullable();
            $table->string('complement', 100)->nullable();
            $table->string('zip_code', 10);
            $table->string('city', 100);
            $table->string('state', 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
